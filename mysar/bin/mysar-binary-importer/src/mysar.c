/*
 Program: mysar, File: mysar.c
 BSD-3-Clause License 2025 by VIPNIX https://vipnix.com.br

 Source is based on MySar 1.x importer, written by David 'scuzzy' Todd <mobilepolice@gmail.com>

  
 This file is part of mysar.

 mysar is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License version 2 as published by
 the Free Software Foundation.

 mysar is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with mysar; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <limits.h>
#include <mysql/mysql.h>
#include <arpa/inet.h>
#include <signal.h>
#include <ctype.h>

#include "mysar.h"

extern char 		output_buffer[LINE_MAX];
extern data_store	record;

FILE *input;


// http://wiki.squid-cache.org/SquidFaq/SquidLogs#head-2914f3a846d41673d4ae34018142e672b8f258ce
//
char *inCacheCodes[] = { "TCP_HIT", "TCP_REFRESH_HIT", "TCP_DENIED", "TCP_REF_FAIL_HIT",
			 "TCP_NEGATIVE_HIT", "TCP_MEM_HIT", "TCP_OFFLINE_HIT" };

void MySAR_signal_handler(int signal)
{
	psignal(signal, "FATAL: MySAR Received Signal: ");

	if (signal==SIGINT || signal==SIGTERM)
	{
		// rollback last operation
		MySAR_db_rollback();
		MySAR_free_mysql_statements();

		if (!config->logfile.compressed)
		{
			// write last file position, prevent duplicationg records
			MySAR_update_config(record.stamp, "lastTimestamp");
			MySAR_update_config_long(ftell(input), "lastLogOffset");
		}

		// close db
		MySAR_db_shutdown();

		// dont forget to remove the lock...
		MySAR_unlock_host();

		exit(EXIT_FAILURE);
	}
}

int main(int argc, char *argv[])
{
	char runtime[15];
	char *mws[MAX_TOKENS];
	
	char *xurl[3];
	char *domain[16];
	int domx;

	signed int lerror=0, inc=0, minor=0, major=0;
	unsigned int cacheCodesCount=0;

	long int start_time;
	long int finish_time;
	time_t time_tm_cycle;
	time_t time_tm_finish;
	struct tm time_result;

	// Setup the program defaults
	MySAR_config_defaults(); 

	// parse command line arguments
	MySAR_parse_args(argc, argv);


	// a small banner 8^)
#ifdef MYSAR_64
	MySAR_print(MSG_NOTICE, "MySAR %s Log importer, 64 bit Version", PACKAGE_VERSION);
#else
	MySAR_print(MSG_NOTICE, "MySAR %s Log importer, 32 bit Version", PACKAGE_VERSION);
#endif
	MySAR_print(MSG_NOTICE, "BSD-3-Clause License 2025 by VIPNIX https://vipnix.com.br\n");


	// read configuration from file
	MySAR_parse_config_file(config->filename);

	// create the lock file
	MySAR_lock_host();

	// these routines does not return
	if (config->db_generate)
		MySAR_db_create();
	else if (config->show_help)
		MySAR_print_help();

	// starts connection with database
	// starts connection with database
	MySAR_db_startup();
	if (!config->db_conn_open) {
		MySAR_print(MSG_ERROR, "FATAL: Database connection not established");
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Last values to be read are from the database.
	MySAR_read_db_config();
	// Wrong version... get out, or we could do nasty things...
	if (config->schemaVersion != CURRENT_SCHEMA_VERSION) {
		MySAR_print(MSG_NOTICE, "ERROR: Your current MySAR version is not supported!");
		MySAR_print(MSG_NOTICE, "Please, make sure you are running the last version of the report Viewer. (%s)\n", VERSION);
		MySAR_print(MSG_ERROR, "Current detected Schema: %d. Supported Schema: %d", config->schemaVersion, CURRENT_SCHEMA_VERSION);
	}

	// Optimize tables if enabled
	// the routine quits the program on the end.
	if (config->optimize_tables)
		MySAR_db_optimize();

	if (config->offline_mode)
		MySAR_print(MSG_NOTICE, "\nOffline mode enabled.\n");

	// Get out if disabled, but accept if in offline mode
	if (!config->importenabled && !config->offline_mode)
		MySAR_print(MSG_ERROR, "\nMySar importer is currently disabled. to enable, change settings on the Administration page.\n");

	// warn if not importing to table traffic
	if (!config->importtraffic)
		MySAR_print(MSG_NOTICE, "\nImporting only domains. Traffic details are disabled.\n");

	// warn if DNS resolver is disabled...
	if (!config->resolver)
		MySAR_print(MSG_NOTICE, "\nDNS name resolver is disabled. hosts will show up only IP addresses on report.\n");
	
	// Get current time
	start_time = MySAR_current_time();

	// Do the cleanup routine
	MySAR_db_cleanup();
	
	// gzip compressed log support
	if (!config->logfile.compressed)
	{
		MySAR_print(MSG_NOTICE, "Loading plain text log file...");
		if ((input = fopen(config->logfile.name, "r")) == NULL)
			MySAR_print(MSG_ERROR, "FATAL: Unable to open the log file: %s", config->logfile.name);
	}
	else {
		MySAR_print(MSG_NOTICE, "Loading gzip compressed log file...");
		MySAR_gzip_open(config->logfile.name);
		if(MySAR_gzip_uncompress_block()==M_EOF)
			MySAR_print(MSG_ERROR, "Gzip block too small! at least 64k of data is needed!");
	}

	// this routine will prevent the importer from running thru all logfile searching
	// for the last time stamp. it does some test to see if the file changed, and set
	// the file pointer on the last seen record.
	if (!config->logfile.compressed && !config->offline_mode)
	{
		// error in file? null file?
		if (fgets(output_buffer, LINE_MAX, input) == NULL)
			MySAR_print(MSG_ERROR, "Error: could not get data from file! is it a blank file?");
		if (MySAR_split(output_buffer, mws, MAX_TOKENS, "")!=MAX_TOKENS)
			MySAR_print(MSG_ERROR, "Error: Invalid logfile format, or error in logfile!");

		// compare with the first seen timestamp
		if (strcmp(mws[0], config->firststamp) == 0)
		{
			MySAR_print(MSG_DEBUG, "Timestamp match.");

			// alright, move file pointer
			if (fseek (input, config->logfile.offset, SEEK_SET) != 0)
				MySAR_print(MSG_ERROR, "FATAL: fseek() failed!");

			MySAR_print(MSG_DEBUG, "Logfile offset is now at: %ld", config->logfile.offset);
		}
		else {
			// new file, update the first timestamp
			MySAR_print(MSG_DEBUG, "Timestamp does not match, this is a new logfile");
			MySAR_update_config(mws[0], "firstLogTimestamp");

			// move file pointer to the start again
			(void)fseek(input, 0L, SEEK_SET);
		}
	}

	// just prepare the statements if everything went ok
	MySAR_prep_mysql();

	// install signals catchers..
	signal(SIGINT, MySAR_signal_handler);
	signal(SIGTERM, MySAR_signal_handler);

//#####################
for (;;) {
    if (config->logfile.compressed) {
        // get more data
        if (MySAR_gzip_get_next_line()==M_EOF)
            break;
    } else if (fgets(output_buffer, LINE_MAX, input) == NULL)
        break;

    // This is our minor line counter, this keeps track of every
    // line we run through, regardless if it's processed or not.
    minor++;

    memset(mws, 0, sizeof(mws));
    inc = MySAR_split(output_buffer, mws, MAX_TOKENS, "");
    if (inc != MAX_TOKENS) {
        MySAR_print(MSG_NOTICE, "Error detected at line %d: Split tokens %s!", minor, (inc > MAX_TOKENS ? "overflow" : "underflow"));
        if (config->debug_enabled) {
            int xx;
            for (xx = 0; xx < (inc > MAX_TOKENS ? MAX_TOKENS : inc); xx++)
                MySAR_print(MSG_DEBUG, "Token%d: %s", xx, mws[xx]);
        }
        lerror++;
        continue;
    }

    // Skip lines already processed, but allow processing if beyond offset
    if (!config->offline_mode && ftell(input) <= config->logfile.offset && strcmp(mws[0], config->laststamp) <= 0) {
        MySAR_print(MSG_DEBUG, "Skipping line %d: already processed (timestamp %s <= %s)", minor, mws[0], config->laststamp);
        continue;
    }

    // discard tokens with cache_object
    if (strstr(mws[6], "cache_object") != NULL) {
        MySAR_print(MSG_DEBUG, "Skipping line %d: contains cache_object", minor);
        continue;
    }

    // discard tokens with localhost
    if (strstr(mws[2], "localhost") != NULL || strstr(mws[6], "localhost") != NULL) {
        MySAR_print(MSG_DEBUG, "Skipping line %d: contains localhost", minor);
        continue;
    }
    // discard tokens with localhost IPV4
    if (strstr(mws[2], "127.0.0.1") != NULL) {
        MySAR_print(MSG_DEBUG, "Skipping line %d: contains 127.0.0.1", minor);
        continue;
    }
    // discard tokens with localhost IPV6
    if (strstr(mws[2], "::1") != NULL) {
        MySAR_print(MSG_DEBUG, "Skipping line %d: contains ::1", minor);
        continue;
    }

    // Sanitize URL by replacing only critical characters
    char *url_ptr = mws[6];
    while (*url_ptr) {
        if (*url_ptr == ' ' || *url_ptr == '\t') // Only replace spaces and tabs
            *url_ptr = '_';
        url_ptr++;
    }

    // This is a record we're going to process, thus, increase the counter so that we
    // know to update the timestamp later.
    major++;
    memset(&record, 0, sizeof(record));

    // Do our date/time calculations on the timestamp provided by the record.
    time_tm_cycle = strtol((char *)mws[0], NULL, 0);
    if (time_tm_cycle == 0) {
        MySAR_print(MSG_NOTICE, "Invalid timestamp at line %d, skipping!", minor);
        continue;
    }
    localtime_r(&time_tm_cycle, &time_result);

    // and record them respectively.
    strftime(record.date, 11, "%Y-%m-%d", &time_result);
    if (strcmp(record.date, "0000-00-00") == 0 || strlen(record.date) != 10) {
        MySAR_print(MSG_NOTICE, "Invalid date generated at line %d, skipping!", minor);
        continue;
    }
    record.l_date = strlen(record.date);
    strftime(record.time, 9, "%H:%M:%S", &time_result);
    record.l_time = strlen(record.time);
    strftime(record.sumtime, 3, "%H", &time_result);
    record.l_sumtime = 2;
    record.sumtime[2] = '\0';

    record.l_stamp = strlen(mws[0]);
    record.l_ip = strlen(mws[2]);
    record.l_result = strlen(mws[3]);
    record.l_bytes = strlen(mws[4]);
    // Truncate URL to 240 characters to avoid parsing issues and DB constraints
    record.l_url = strlen(mws[6]) > 240 ? 240 : strlen(mws[6]);
    record.l_authuser = strlen(mws[7]);

    memcpy(record.stamp, mws[0], record.l_stamp + 1);
    memcpy(record.ip, mws[2], record.l_ip + 1);
    memcpy(record.result, mws[3], record.l_result + 1);
    memcpy(record.s_result, mws[3], MySAR_copy_until(mws[3], '/'));
    memcpy(record.bytes, mws[4], record.l_bytes + 1);
    // Copy only the first 240 characters of the URL
    strncpy(record.url, mws[6], record.l_url);
    record.url[record.l_url] = '\0';
    memcpy(record.xurl, record.url, record.l_url + 1); // used by the split function
    memcpy(record.authuser, mws[7], record.l_authuser + 1);
    record.l_s_result = strlen(record.s_result);

    // Extract site from URL
    int url_tokens = MySAR_split(record.xurl, xurl, 4, "/");
    if (url_tokens >= 2 && xurl[0] && xurl[2] && strlen(xurl[2]) > 0) {
        if (config->group_domains && !isdigit(xurl[2][0])) {
            domx = MySAR_split(xurl[2], domain, 16, ".");
            domx--;
            if (domx <= 1) {
                snprintf(record.site, 240, "%s//%s", xurl[0], xurl[2]);
            } else {
                if (MySAR_isTLD(domain[domx - 1]) == 0)
                    snprintf(record.site, 240, "%s//%s.%s", xurl[0], domain[domx - 1], domain[domx]);
                else
                    snprintf(record.site, 240, "%s//%s.%s.%s", xurl[0], domain[domx - 2], domain[domx - 1], domain[domx]);
            }
        } else {
            snprintf(record.site, 240, "%s//%s", xurl[0], xurl[2]);
        }
    } else {
        // Fallback: extract domain manually
        char *domain_start = strstr(record.url, "://");
        if (domain_start) {
            domain_start += 3; // Skip "://"
            char *domain_end = strchr(domain_start, '/');
            if (!domain_end) {
                // Handle URLs with port or no path (e.g., web.whatsapp.com:5222)
                domain_end = strchr(domain_start, ':');
                if (!domain_end) domain_end = domain_start + strlen(domain_start);
            }
            size_t domain_len = domain_end - domain_start;
            if (domain_len > 0 && domain_len < 240) {
                strncpy(record.site, domain_start, domain_len);
                record.site[domain_len] = '\0';
            } else {
                strncpy(record.site, record.url, 240);
                record.site[239] = '\0';
            }
        } else {
            strncpy(record.site, record.url, 240);
            record.site[239] = '\0';
        }
        // Final fallback to IP if still empty
        if (strlen(record.site) == 0 || record.site[0] == '\0') {
            MySAR_print(MSG_NOTICE, "Empty site generated at line %d, using IP fallback for URL %s!", minor, record.url);
            snprintf(record.site, 240, "unknown://%s", mws[2]);
        }
    }
    record.l_site = strlen(record.site);

    // Debug site value
    if (config->debug_enabled) {
        MySAR_print(MSG_DEBUG, "site gerado: %s", record.site);
    }
    if (record.l_site == 0 || strlen(record.site) == 0) {
        MySAR_print(MSG_ERROR, "ALERTA: site vazio para URL %s", record.url);
    }

    // convert the quad dotted Ip format to the netshort format
    snprintf(record.ipns, sizeof(record.ipns), "%u", inet_network(record.ip));
    record.l_ipns = strlen(record.ipns);

    // It will always be out cache, until we test.
    record.field = TYPE_OUT_CACHE;

    // TCP_MISS is our most often cache result field
    if (!memcmp(record.s_result, "TCP_MISS", record.l_s_result) == 0) {
        for (cacheCodesCount = 0; cacheCodesCount <= sizeof(inCacheCodes) / BITSHIFT - 1; cacheCodesCount++) {
            if (memcmp(record.s_result, inCacheCodes[cacheCodesCount], record.l_s_result) == 0) {
                record.field = TYPE_IN_CACHE;
                break;
            }
        }
    }

    if ((config->show_status) && (major % 1000 == 0) && (MySAR_current_time() - start_time) > 0) {
        MySAR_print(MSG_NOTICE, "Processed: %4d records at %3lu/sec Runtime: %lu seconds",
            major, (major / (MySAR_current_time() - start_time)), (MySAR_current_time() - start_time));
    }

    // must follow the right sequence
    MySAR_import_sites();    // import the sites
    MySAR_import_users();    // import the usernames
    MySAR_import_hostnames(); // import the hostnames

    MySAR_import_traffic();   // import the whole traffic

    MySAR_import_summaries(); // now do the summaries
}
//#####################
	if (config->logfile.compressed)
		MySAR_gzip_close();
	else {
		// save file position pointer
		config->logfile.offset=ftell(input);
		fclose(input);
	}

	// free the used memory
	MySAR_free_mysql_statements();

	if (major>0 && !config->offline_mode)
	{
		// store values only if valid records were processed
		MySAR_update_config(record.stamp, "lastTimestamp");
		MySAR_update_config_long((long)major, "lastImportedRecordsNumber");
		MySAR_update_config_long(config->logfile.offset, "lastLogOffset");
	}

	finish_time = MySAR_current_time();
	time_tm_finish = finish_time - start_time;

	localtime_r(&time_tm_finish, &time_result);
	strftime(runtime, sizeof(runtime), "%M:%S", &time_result);

	MySAR_print(MSG_NOTICE, "Total runtime: %u seconds. Processed: %d Imported: %d Read errors: %d", (unsigned int)time_tm_finish, minor, major, lerror);
	MySAR_db_shutdown();

	// remove the lock after finish
	MySAR_unlock_host();

	return M_OK;
}

