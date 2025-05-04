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
#include <sys/stat.h>

#include "mysar.h"

extern char 		output_buffer[LINE_MAX];
extern data_store	record;

FILE *input;

// http://wiki.squid-cache.org/SquidFaq/SquidLogs#head-2914f3a846d41673d4ae34018142e672b8f258ce
char *inCacheCodes[] = { "TCP_HIT", "TCP_REFRESH_HIT", "TCP_DENIED", "TCP_REF_FAIL_HIT",
			 "TCP_NEGATIVE_HIT", "TCP_MEM_HIT", "TCP_OFFLINE_HIT" };

void MySAR_signal_handler(int signal)
{
    psignal(signal, "FATAL: MySAR Received Signal: ");

    if (signal==SIGINT || signal==SIGTERM)
    {
        MySAR_db_rollback();
        MySAR_free_mysql_statements();

        if (!config->logfile.compressed && input)
        {
            MySAR_update_config(record.stamp, "lastTimestamp");
            MySAR_update_config_long(ftell(input), "lastLogOffset");
        }

        MySAR_db_shutdown();
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

    MySAR_config_defaults();
    MySAR_parse_args(argc, argv);

#ifdef MYSAR_64
    MySAR_print(MSG_NOTICE, "MySAR %s Log importer, 64 bit Version", PACKAGE_VERSION);
#else
    MySAR_print(MSG_NOTICE, "MySAR %s Log importer, 32 bit Version", PACKAGE_VERSION);
#endif
    MySAR_print(MSG_NOTICE, "BSD-3-Clause License 2025 by VIPNIX https://vipnix.com.br\n");

    MySAR_parse_config_file(config->filename);
    MySAR_lock_host();

    if (config->db_generate)
        MySAR_db_create();
    else if (config->show_help)
        MySAR_print_help();

    MySAR_db_startup();
    if (!config->db_conn_open) {
        MySAR_print(MSG_ERROR, "FATAL: Database connection not established");
        MySAR_unlock_host();
        exit(EXIT_FAILURE);
    }

    MySAR_read_db_config();
    if (config->schemaVersion != CURRENT_SCHEMA_VERSION) {
        MySAR_print(MSG_NOTICE, "ERROR: Your current MySAR version is not supported!");
        MySAR_print(MSG_NOTICE, "Please, make sure you are running the last version of the report Viewer. (%s)\n", VERSION);
        MySAR_print(MSG_ERROR, "Current detected Schema: %d. Supported Schema: %d", config->schemaVersion, CURRENT_SCHEMA_VERSION);
    }

    if (config->optimize_tables)
        MySAR_db_optimize();

    if (config->offline_mode)
        MySAR_print(MSG_NOTICE, "\nOffline mode enabled.\n");

    if (!config->importenabled && !config->offline_mode)
        MySAR_print(MSG_ERROR, "\nMySar importer is currently disabled. to enable, change settings on the Administration page.\n");

    if (!config->importtraffic)
        MySAR_print(MSG_NOTICE, "\nImporting only domains. Traffic details are disabled.\n");

    if (!config->resolver)
        MySAR_print(MSG_NOTICE, "\nDNS name resolver is disabled. hosts will show up only IP addresses on report.\n");

    start_time = MySAR_current_time();

    MySAR_db_cleanup();

    if (!config->logfile.compressed)
    {
        MySAR_print(MSG_NOTICE, "Loading plain text log file...");
        if ((input = fopen(config->logfile.name, "r")) == NULL) {
            MySAR_print(MSG_ERROR, "FATAL: Unable to open the log file: %s", config->logfile.name);
            MySAR_db_shutdown();
            MySAR_unlock_host();
            exit(EXIT_FAILURE);
        }

        // Check for log rotation or empty file using file size
        struct stat log_stat;
        if (stat(config->logfile.name, &log_stat) == 0) {
            if (log_stat.st_size == 0 || log_stat.st_size < config->logfile.offset / 2) {
                MySAR_print(MSG_DEBUG, "Log file is empty or rotated (size: %ld, offset: %ld), resetting offset and timestamp.",
                            (long)log_stat.st_size, config->logfile.offset);
                config->logfile.offset = 0;
                MySAR_update_config_long(0, "lastLogOffset");
                MySAR_update_config("0", "firstLogTimestamp");
                MySAR_update_config("0", "lastTimestamp");
                fseek(input, 0L, SEEK_SET);
            } else {
                // Try reading the first line
                if (fgets(output_buffer, LINE_MAX, input) == NULL) {
                    MySAR_print(MSG_DEBUG, "Log file is empty, resetting offset.");
                    config->logfile.offset = 0;
                    MySAR_update_config_long(0, "lastLogOffset");
                    MySAR_update_config("0", "firstLogTimestamp");
                    MySAR_update_config("0", "lastTimestamp");
                    fseek(input, 0L, SEEK_SET);
                } else {
                    if (MySAR_split(output_buffer, mws, MAX_TOKENS, "") != MAX_TOKENS) {
                        MySAR_print(MSG_DEBUG, "Invalid logfile format in first line, treating as new file.");
                        config->logfile.offset = 0;
                        MySAR_update_config_long(0, "lastLogOffset");
                        MySAR_update_config("0", "firstLogTimestamp");
                        fseek(input, 0L, SEEK_SET);
                    } else if (strcmp(mws[0], config->firststamp) == 0) {
                        MySAR_print(MSG_DEBUG, "Timestamp match.");
                        if (fseek(input, config->logfile.offset, SEEK_SET) != 0) {
                            MySAR_print(MSG_DEBUG, "fseek failed, starting from beginning.");
                            config->logfile.offset = 0;
                            MySAR_update_config_long(0, "lastLogOffset");
                            fseek(input, 0L, SEEK_SET);
                        } else {
                            MySAR_print(MSG_DEBUG, "Logfile offset is now at: %ld", config->logfile.offset);
                        }
                    } else {
                        MySAR_print(MSG_DEBUG, "Timestamp does not match, this is a new logfile");
                        MySAR_update_config(mws[0], "firstLogTimestamp");
                        config->logfile.offset = 0;
                        MySAR_update_config_long(0, "lastLogOffset");
                        fseek(input, 0L, SEEK_SET);
                    }
                }
            }
        } else {
            MySAR_print(MSG_ERROR, "FATAL: Unable to stat log file: %s", config->logfile.name);
            fclose(input);
            MySAR_db_shutdown();
            MySAR_unlock_host();
            exit(EXIT_FAILURE);
        }
    }
    else {
        MySAR_print(MSG_NOTICE, "Loading gzip compressed log file...");
        MySAR_gzip_open(config->logfile.name);
        if (MySAR_gzip_uncompress_block() == M_EOF)
            MySAR_print(MSG_ERROR, "Gzip block too small! at least 64k of data is needed!");
    }

    MySAR_prep_mysql();
    signal(SIGINT, MySAR_signal_handler);
    signal(SIGTERM, MySAR_signal_handler);

    for (;;) {
        if (config->logfile.compressed) {
            if (MySAR_gzip_get_next_line() == M_EOF)
                break;
        } else if (fgets(output_buffer, LINE_MAX, input) == NULL)
            break;

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

        if (!config->offline_mode && strcmp(mws[0], config->laststamp) <= 0) {
            MySAR_print(MSG_DEBUG, "Skipping line %d: already processed (timestamp %s <= %s)", minor, mws[0], config->laststamp);
            continue;
        }

        if (strstr(mws[6], "cache_object") != NULL) {
            MySAR_print(MSG_DEBUG, "Skipping line %d: contains cache_object", minor);
            continue;
        }

        if (strstr(mws[2], "localhost") != NULL || strstr(mws[6], "localhost") != NULL) {
            MySAR_print(MSG_DEBUG, "Skipping line %d: contains localhost", minor);
            continue;
        }
        if (strstr(mws[2], "127.0.0.1") != NULL) {
            MySAR_print(MSG_DEBUG, "Skipping line %d: contains 127.0.0.1", minor);
            continue;
        }
        if (strstr(mws[2], "::1") != NULL) {
            MySAR_print(MSG_DEBUG, "Skipping line %d: contains ::1", minor);
            continue;
        }

        char *url_ptr = mws[6];
        while (*url_ptr) {
            if (*url_ptr == ' ' || *url_ptr == '\t')
                *url_ptr = '_';
            url_ptr++;
        }

        major++;
        memset(&record, 0, sizeof(record));

        time_tm_cycle = strtol((char *)mws[0], NULL, 0);
        if (time_tm_cycle == 0) {
            MySAR_print(MSG_NOTICE, "Invalid timestamp at line %d, skipping!", minor);
            continue;
        }
        localtime_r(&time_tm_cycle, &time_result);

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
        record.l_url = strlen(mws[6]) > 240 ? 240 : strlen(mws[6]);
        record.l_authuser = strlen(mws[7]);

        memcpy(record.stamp, mws[0], record.l_stamp + 1);
        memcpy(record.ip, mws[2], record.l_ip + 1);
        memcpy(record.result, mws[3], record.l_result + 1);
        memcpy(record.s_result, mws[3], MySAR_copy_until(mws[3], '/'));
        memcpy(record.bytes, mws[4], record.l_bytes + 1);
        strncpy(record.url, mws[6], record.l_url);
        record.url[record.l_url] = '\0';
        memcpy(record.xurl, record.url, record.l_url + 1);
        memcpy(record.authuser, mws[7], record.l_authuser + 1);
        record.l_s_result = strlen(record.s_result);

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
            char *domain_start = strstr(record.url, "://");
            if (domain_start) {
                domain_start += 3;
                char *domain_end = strchr(domain_start, '/');
                if (!domain_end) {
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
            if (strlen(record.site) == 0 || record.site[0] == '\0') {
                MySAR_print(MSG_NOTICE, "Empty site generated at line %d, using IP fallback for URL %s!", minor, record.url);
                snprintf(record.site, 240, "unknown://%s", mws[2]);
            }
        }
        record.l_site = strlen(record.site);

        if (config->debug_enabled) {
            MySAR_print(MSG_DEBUG, "site gerado: %s", record.site);
        }
        if (record.l_site == 0 || strlen(record.site) == 0) {
            MySAR_print(MSG_ERROR, "ALERTA: site vazio para URL %s", record.url);
        }

        snprintf(record.ipns, sizeof(record.ipns), "%u", inet_network(record.ip));
        record.l_ipns = strlen(record.ipns);

        record.field = TYPE_OUT_CACHE;

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

        MySAR_import_sites();
        MySAR_import_users();
        MySAR_import_hostnames();
        MySAR_import_traffic();
        MySAR_import_summaries();
    }

    if (config->logfile.compressed)
        MySAR_gzip_close();
    else {
        config->logfile.offset = ftell(input);
        fclose(input);
    }

    MySAR_free_mysql_statements();

    if (major > 0 && !config->offline_mode)
    {
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

    MySAR_unlock_host();

    return M_OK;
}
