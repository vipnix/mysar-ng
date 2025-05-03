/*
 Program: mysar, File: sql.c
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
#include <mysql/mysql.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <netdb.h>

#include "mysar.h"


// MySQL statements for Mysar 2.x
#define xSTMT_INSTRAFFIC	"INSERT INTO traffic(date,time,sitesID,usersID,ip,resultCode,bytes,url,authuser) VALUES (?,?,?,?,?,?,?,?,?)"

#define xSTMT_SELRESOLVED	"SELECT isResolved FROM hostnames WHERE ip=?"
#define xSTMT_INSRESOLVED	"INSERT INTO hostnames (ip, hostname, isResolved) VALUES (?,?,?)"

#define xSTMT_SELSITES		"SELECT id FROM sites WHERE date=? AND site=?"
#define xSTMT_INSSITES		"INSERT INTO sites(site,date) VALUES (?,?)"

#define xSTMT_SELUSERS		"SELECT id FROM users WHERE date=? AND authuser=?"
#define xSTMT_INSUSERS		"INSERT INTO users(authuser,date) VALUES (?,?)"

#define xSTMT_INSSUMS_IN	"INSERT INTO trafficSummaries(date,ip,inCache,sitesID,usersID,summaryTime) VALUES (?,?,?,?,?,?)"
#define xSTMT_INSSUMS_OUT	"INSERT INTO trafficSummaries(date,ip,outCache,sitesID,usersID,summaryTime) VALUES (?,?,?,?,?,?)"

#define xSTMT_UPDSUMS_IN	"UPDATE trafficSummaries SET inCache=inCache+? WHERE date=? AND ip=? AND sitesID=? AND usersID=? AND summaryTime=?"
#define xSTMT_UPDSUMS_OUT	"UPDATE trafficSummaries SET outCache=outCache+? WHERE date=? AND ip=? AND sitesID=? AND usersID=? AND summaryTime=?"


// MYSQL Data Types
MYSQL		*mysql  = NULL;

MYSQL_STMT	*insert_traffic = NULL;
MYSQL_STMT	*insert_resolved = NULL;
MYSQL_STMT	*select_resolved = NULL;
MYSQL_STMT	*insert_sites = NULL;
MYSQL_STMT	*select_sites = NULL;
MYSQL_STMT	*insert_users = NULL;
MYSQL_STMT	*select_users = NULL;
MYSQL_STMT	*update_sums_in = NULL;
MYSQL_STMT	*update_sums_out = NULL;
MYSQL_STMT	*insert_sums_in = NULL;
MYSQL_STMT	*insert_sums_out = NULL;

MYSQL_BIND	bind_insert_traffic[9];
MYSQL_BIND	bind_insert_resolved[3];
MYSQL_BIND	bind_select_resolved[1];
MYSQL_BIND	bind_insert_sites[2];
MYSQL_BIND	bind_select_sites[2];

MYSQL_BIND	bind_insert_users[2];
MYSQL_BIND	bind_select_users[2];

MYSQL_BIND	bind_update_sums_in[6];
MYSQL_BIND	bind_update_sums_out[6];

MYSQL_BIND	bind_insert_sums_in[6];
MYSQL_BIND	bind_insert_sums_out[6];

MYSQL_BIND	bind_output[1];

unsigned long	len[1];
char		bind_data[50];

data_store	record;

// update 'value' in 'config' where name is 'name'
int MySAR_update_config(char *value, char *name)
{
	char query[512];
	
	//snprintf(query, sizeof(query), "UPDATE config SET value='%s' WHERE name='%s'", value, name);
	snprintf(query, sizeof(query), "INSERT INTO config (name,value) VALUES ('%s','%s') ON DUPLICATE KEY UPDATE value=VALUES(value)", name, value);
	MySAR_push_query_free(query);
	
	return 0;
}

int MySAR_update_config_long(long value, char *name)
{
	char buf[40];

	snprintf(buf, sizeof(buf), "%ld", value);
	MySAR_update_config(buf, name);

	return 0;
}

long MySAR_fetch_config_long(char *name)
{
	char *val;

	val=MySAR_fetch_configvalue(name);

	// crap mysql
	return atol(val);
}

// retrieve 'value' from 'config' where name is 'name'
// return with select_field.
char *MySAR_fetch_configvalue(char *name)
{
	char query[512];
	char *return_result;
	MYSQL_ROW row;
	MYSQL_RES *result;
	
	snprintf(query, sizeof(query), "SELECT value FROM config WHERE name='%s'", name);
	MySAR_push_query(query);

	if ((result = mysql_use_result(mysql)) == NULL)
		return "";
	
	if ((row = mysql_fetch_row(result)) == NULL)
		return "";
	
	asprintf(&return_result, "%s", row[0]);
	mysql_free_result(result);
	
	return return_result;
}

// send a query to the MySQL database, free the result
int MySAR_push_query_free(char *query)
{
	int ret;
	MYSQL_RES *result;

	if ((ret = mysql_real_query(mysql, query, (unsigned int) strlen(query))) != 0)
		MySAR_print(MSG_ERROR, "mysql_real_query() in MySAR_push_query_free() %s", mysql_error(mysql));

	// some data returned
	if ((result = mysql_use_result(mysql)) != NULL)
		mysql_free_result(result);
	
	return 0;
}

// send a query and retain the result
int MySAR_push_query(char *query)
{
	int ret;
	if ((ret = mysql_real_query(mysql, query, (unsigned int) strlen(query))) != 0)
		MySAR_print(MSG_ERROR, "mysql_real_query() in MySAR_push_query() %s", mysql_error(mysql));
	
	return 0;
}

// free the used statements
void MySAR_free_mysql_statements()
{
	MySAR_print(MSG_NOTICE, "Freeing statements....");

	// free any select results
	mysql_stmt_free_result(select_resolved);
	mysql_stmt_free_result(select_sites);
	mysql_stmt_free_result(select_users);

	mysql_stmt_close(insert_traffic);
	mysql_stmt_close(insert_resolved);
	mysql_stmt_close(select_resolved);
	mysql_stmt_close(insert_sites);
	mysql_stmt_close(select_sites);
	mysql_stmt_close(insert_users);
	mysql_stmt_close(select_users);
	mysql_stmt_close(update_sums_in);
	mysql_stmt_close(update_sums_out);
	mysql_stmt_close(insert_sums_in);
	mysql_stmt_close(insert_sums_out);
}

// used to prepare MySQL statements
void MySAR_prepare_stmt(MYSQL_STMT *stmt, const char *stmt_str, unsigned long length)
{
	if (!stmt) {
		MySAR_print(MSG_ERROR, "FATAL: NULL statement pointer in MySAR_prepare_stmt");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing Statement: %s", stmt_str);
	if (mysql_stmt_prepare(stmt, stmt_str, length) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: Error while preparing MySQL statement: %s", mysql_stmt_error(stmt));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
}

// inlining give it a boost, as these routines are called lots of times
inline int MySAR_execute_stmt(MYSQL_STMT *stmt)
{
	int st;

	// this way I can avoid repeating lots of code...
	if ((st=mysql_stmt_execute(stmt)) != 0)
		MySAR_print(MSG_ERROR, "FATAL: Statement Error: %s", mysql_stmt_error(stmt));

	return st;
}

// used to create a bind to retrieve data
inline void MySAR_bind_stmt(MYSQL_STMT *stmt, MYSQL_BIND *bind)
{
	int st;

	if ((st=mysql_stmt_bind_result(stmt, bind)) != 0)
		MySAR_print(MSG_ERROR, "FATAL: Statement Bind Error: %s", mysql_stmt_error(stmt));

}


void MySAR_import_traffic()
{
	if (config->importtraffic)
	{
		// Insert our record data into the 'traffic' table
		(void)MySAR_execute_stmt(insert_traffic);
	}
}

void MySAR_import_hostnames()
{
	struct sockaddr_in san;
	int fetch_return;
	int san_len;

	// select our statements from the hostnames table.
	(void)MySAR_execute_stmt(select_resolved);
	MySAR_bind_stmt(select_resolved, bind_output);

	fetch_return = mysql_stmt_fetch(select_resolved);

	// huh? host is not in table
	// enter this routine only if the host is not on table
	if (fetch_return == MYSQL_NO_DATA)
	{
		// Get the hostname of the record, if enabled. - if it returns non-zero, use the ip address.
		if (config->resolver)
		{
			// create the socket only if the resolver is enabled
			memset(&san, 0, sizeof(san));
			san.sin_family = AF_INET;
			san.sin_port = htons(0);
			san.sin_addr.s_addr = inet_addr(record.ip);
			memset(&(san.sin_zero), '\0', 8);
			san_len = sizeof(san);

			if (getnameinfo((struct sockaddr *)&san, san_len, record.hostname, sizeof(record.hostname), NULL, 0, NI_NAMEREQD) != 0)
			{
				// nope, could not get hostname. use IP instead.
				strcpy(record.hostname, record.ip);
				// set resolved to zero, as we'll try to resolve it later...
				strcpy(record.isResolved, "0");
			}
			else
				strcpy(record.isResolved, "1");
		}
		else
		{
			// if resolver disabled, use the IP address
			strcpy(record.hostname, record.ip);
			strcpy(record.isResolved, "0");
		}
		record.l_hostname = strlen(record.hostname);
		record.l_isResolved = strlen(record.isResolved);

		// execute the insert statement
		(void)MySAR_execute_stmt(insert_resolved);

	}
	else if (fetch_return == 0)
	{
		// got it
		//if (mysql_stmt_fetch_column(select_resolved, bind_output, 0, 0) == 0)
		//{
		//	snprintf(record.isResolved, sizeof(record.isResolved), "%s", (char *)bind_output[0].buffer);
		//}
		//else
		//	MySAR_print(MSG_ERROR, "mysql_stmt_fetch_column in processing loop %s", mysql_stmt_error(select_resolved));
	}
	else
		MySAR_print(MSG_ERROR, "Statement Error in MySAR_import_hostnames(): %s", mysql_stmt_error(select_resolved));

	// Free statements
	// hostname search is completed
	mysql_stmt_free_result(select_resolved);
}



//############################

void MySAR_import_sites()
{
    int fetch_return;
    static unsigned long insert_count = 0; // Contador de inserções

    // Ignore sites with length > 240 characters
    if (record.l_site > 240) {
        MySAR_print(MSG_NOTICE, "Site length exceeds 240 characters, skipping insert_sites");
        snprintf(record.siteid, sizeof(record.siteid), "0");
        record.l_siteid = strlen(record.siteid);
        return;
    }

    // Debug the values being inserted
    if (config->debug_enabled) {
        MySAR_print(MSG_DEBUG, "Attempting to insert site: %s, date: %s", record.site, record.date);
    }

    // Execute the statement to find the desired site on the database
    if (MySAR_execute_stmt(select_sites) != 0) {
        MySAR_print(MSG_ERROR, "Select failed: %s", mysql_stmt_error(select_sites));
        snprintf(record.siteid, sizeof(record.siteid), "0");
        record.l_siteid = strlen(record.siteid);
        mysql_stmt_free_result(select_sites);
        return;
    }
    MySAR_bind_stmt(select_sites, bind_output);

    fetch_return = mysql_stmt_fetch(select_sites);

    // Insert it
    if (fetch_return == MYSQL_NO_DATA) {
        if (MySAR_execute_stmt(insert_sites) == 0) {
            unsigned long long insert_id = mysql_stmt_insert_id(insert_sites);
            snprintf(record.siteid, sizeof(record.siteid), "%u", (unsigned int)insert_id);
            insert_count++;
            if (config->debug_enabled) {
                MySAR_print(MSG_DEBUG, "Inserted site with ID: %s (Total inserts: %lu)", record.siteid, insert_count);
            }
        } else {
            MySAR_print(MSG_ERROR, "Insert failed: %s", mysql_stmt_error(insert_sites));
            snprintf(record.siteid, sizeof(record.siteid), "0");
            record.l_siteid = strlen(record.siteid);
        }
    } else if (fetch_return == 0) {
        if (mysql_stmt_fetch_column(select_sites, bind_output, 0, 0) == 0) {
            snprintf(record.siteid, sizeof(record.siteid), "%s", (char *)bind_output[0].buffer);
            if (config->debug_enabled) {
                MySAR_print(MSG_DEBUG, "Found existing site ID: %s", record.siteid);
            }
        } else {
            MySAR_print(MSG_ERROR, "mysql_stmt_fetch_column in process loop %s", mysql_stmt_error(select_sites));
            snprintf(record.siteid, sizeof(record.siteid), "0");
            record.l_siteid = strlen(record.siteid);
        }
    } else {
        MySAR_print(MSG_ERROR, "Statement Error in MySAR_import_sites(): %s", mysql_stmt_error(select_sites));
        snprintf(record.siteid, sizeof(record.siteid), "0");
        record.l_siteid = strlen(record.siteid);
    }

    record.l_siteid = strlen(record.siteid);
    mysql_stmt_free_result(select_sites);
}

//############################
void MySAR_import_users()
{
	int fetch_return;

	// execute the statement to find the desired user
	(void)MySAR_execute_stmt(select_users);
	MySAR_bind_stmt(select_users, bind_output);

	fetch_return = mysql_stmt_fetch(select_users);

	// insert it
	if (fetch_return == MYSQL_NO_DATA)
	{
		if (MySAR_execute_stmt(insert_users) == 0)
			snprintf(record.usersid, sizeof(record.usersid), "%u", (unsigned int)mysql_stmt_insert_id(insert_users));
	}
	else if (fetch_return == 0)
	{
		if (mysql_stmt_fetch_column(select_users, bind_output, 0, 0) == 0)
			snprintf(record.usersid, sizeof(record.usersid), "%s", (char *)bind_output[0].buffer);
		else
			MySAR_print(MSG_ERROR, "mysql_stmt_fetch_column in process loop %s", mysql_stmt_error(select_users));
	}
	else
		MySAR_print(MSG_ERROR, "Statement Error in MySAR_import_users(): %s", mysql_stmt_error(select_users));

	record.l_usersid = strlen(record.usersid);
	mysql_stmt_free_result(select_users);
}

void MySAR_import_summaries()
{
	if (record.field == TYPE_IN_CACHE)
	{
		// if the record exists in database...
		(void)MySAR_execute_stmt(update_sums_in);

		if (mysql_stmt_affected_rows(update_sums_in) == 0)
			(void)MySAR_execute_stmt(insert_sums_in);
	}
	else
	{
		(void)MySAR_execute_stmt(update_sums_out);

		if (mysql_stmt_affected_rows(update_sums_out) == 0)
			(void)MySAR_execute_stmt(insert_sums_out);
	}
}



void MySAR_prep_mysql(void)
{
	// All prepares are done here. Statements declarations occupies
	// a lot of lines, but they are really FAST!

	// Force reinitialization of the connection to ensure a clean state
	if (mysql) {
		mysql_close(mysql);
	}
	mysql = mysql_init(NULL);
	if (!mysql) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_init() failed in MySAR_prep_mysql: %s", mysql_error(NULL));
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	// Set connection options for compatibility
	mysql_options(mysql, MYSQL_OPT_RECONNECT, &(my_bool){1});
	if (!mysql_real_connect(mysql, config->dbserver, config->dbuser, config->dbpass, config->dbname, 0, NULL, CLIENT_FOUND_ROWS)) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_real_connect() failed in MySAR_prep_mysql: %s", mysql_error(mysql));
		mysql_close(mysql);
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Reinitialized MySQL connection for statement preparation.");

	// Verify connection pointer before initializing statements
	if (mysql == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: MySQL connection pointer is NULL before stmt_init");
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Initialize and prepare the Statements one by one with detailed debugging
	MySAR_print(MSG_DEBUG, "Initializing insert_traffic statement...");
	insert_traffic = mysql_stmt_init(mysql);
	if (insert_traffic == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_traffic: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_traffic statement...");
	if (insert_traffic == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_traffic is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_traffic, xSTMT_INSTRAFFIC, sizeof(xSTMT_INSTRAFFIC));

	MySAR_print(MSG_DEBUG, "Initializing insert_resolved statement...");
	insert_resolved = mysql_stmt_init(mysql);
	if (insert_resolved == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_resolved: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_resolved statement...");
	if (insert_resolved == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_resolved is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_resolved, xSTMT_INSRESOLVED, sizeof(xSTMT_INSRESOLVED));

	MySAR_print(MSG_DEBUG, "Initializing select_resolved statement...");
	select_resolved = mysql_stmt_init(mysql);
	if (select_resolved == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for select_resolved: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing select_resolved statement...");
	if (select_resolved == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: select_resolved is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(select_resolved, xSTMT_SELRESOLVED, sizeof(xSTMT_SELRESOLVED));

	MySAR_print(MSG_DEBUG, "Initializing insert_sites statement...");
	insert_sites = mysql_stmt_init(mysql);
	if (insert_sites == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_sites: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_sites statement...");
	if (insert_sites == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_sites is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_sites, xSTMT_INSSITES, sizeof(xSTMT_INSSITES));

	MySAR_print(MSG_DEBUG, "Initializing select_sites statement...");
	select_sites = mysql_stmt_init(mysql);
	if (select_sites == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for select_sites: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing select_sites statement...");
	if (select_sites == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: select_sites is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(select_sites, xSTMT_SELSITES, sizeof(xSTMT_SELSITES));

	MySAR_print(MSG_DEBUG, "Initializing insert_users statement...");
	insert_users = mysql_stmt_init(mysql);
	if (insert_users == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_users: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_users statement...");
	if (insert_users == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_users is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_users, xSTMT_INSUSERS, sizeof(xSTMT_INSUSERS));

	MySAR_print(MSG_DEBUG, "Initializing select_users statement...");
	select_users = mysql_stmt_init(mysql);
	if (select_users == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for select_users: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing select_users statement...");
	if (select_users == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: select_users is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(select_users, xSTMT_SELUSERS, sizeof(xSTMT_SELUSERS));

	MySAR_print(MSG_DEBUG, "Initializing update_sums_in statement...");
	update_sums_in = mysql_stmt_init(mysql);
	if (update_sums_in == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for update_sums_in: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing update_sums_in statement...");
	if (update_sums_in == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: update_sums_in is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(update_sums_in, xSTMT_UPDSUMS_IN, sizeof(xSTMT_UPDSUMS_IN));

	MySAR_print(MSG_DEBUG, "Initializing update_sums_out statement...");
	update_sums_out = mysql_stmt_init(mysql);
	if (update_sums_out == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for update_sums_out: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing update_sums_out statement...");
	if (update_sums_out == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: update_sums_out is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(update_sums_out, xSTMT_UPDSUMS_OUT, sizeof(xSTMT_UPDSUMS_OUT));

	MySAR_print(MSG_DEBUG, "Initializing insert_sums_in statement...");
	insert_sums_in = mysql_stmt_init(mysql);
	if (insert_sums_in == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_sums_in: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_sums_in statement...");
	if (insert_sums_in == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_sums_in is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_sums_in, xSTMT_INSSUMS_IN, sizeof(xSTMT_INSSUMS_IN));

	MySAR_print(MSG_DEBUG, "Initializing insert_sums_out statement...");
	insert_sums_out = mysql_stmt_init(mysql);
	if (insert_sums_out == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_init failed for insert_sums_out: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_print(MSG_DEBUG, "Preparing insert_sums_out statement...");
	if (insert_sums_out == NULL) {
		MySAR_print(MSG_ERROR, "FATAL: insert_sums_out is NULL after mysql_stmt_init: %s", mysql_error(mysql));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	MySAR_prepare_stmt(insert_sums_out, xSTMT_INSSUMS_OUT, sizeof(xSTMT_INSSUMS_OUT));

	// Configure bindings for insert_traffic
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_traffic...");
	if (!record.date || !record.time || !record.siteid || !record.usersid || !record.ipns ||
	    !record.result || !record.bytes || !record.url || !record.authuser) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_traffic");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_traffic, 0, sizeof(bind_insert_traffic));
	bind_insert_traffic[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[0].buffer = record.date;
	bind_insert_traffic[0].buffer_length = record.l_date;
	bind_insert_traffic[0].is_null = 0;
	bind_insert_traffic[0].length = &record.l_date;

	bind_insert_traffic[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[1].buffer = record.time;
	bind_insert_traffic[1].buffer_length = record.l_time;
	bind_insert_traffic[1].is_null = 0;
	bind_insert_traffic[1].length = &record.l_time;

	bind_insert_traffic[2].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[2].buffer = record.siteid;
	bind_insert_traffic[2].buffer_length = record.l_siteid;
	bind_insert_traffic[2].is_null = 0;
	bind_insert_traffic[2].length = &record.l_siteid;

	bind_insert_traffic[3].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[3].buffer = record.usersid;
	bind_insert_traffic[3].buffer_length = record.l_usersid;
	bind_insert_traffic[3].is_null = 0;
	bind_insert_traffic[3].length = &record.l_usersid;

	bind_insert_traffic[4].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[4].buffer = record.ipns;
	bind_insert_traffic[4].buffer_length = record.l_ipns;
	bind_insert_traffic[4].is_null = 0;
	bind_insert_traffic[4].length = &record.l_ipns;

	bind_insert_traffic[5].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[5].buffer = record.result;
	bind_insert_traffic[5].buffer_length = record.l_result;
	bind_insert_traffic[5].is_null = 0;
	bind_insert_traffic[5].length = &record.l_result;

	bind_insert_traffic[6].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[6].buffer = record.bytes;
	bind_insert_traffic[6].buffer_length = record.l_bytes;
	bind_insert_traffic[6].is_null = 0;
	bind_insert_traffic[6].length = &record.l_bytes;

	bind_insert_traffic[7].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[7].buffer = record.url;
	bind_insert_traffic[7].buffer_length = record.l_url;
	bind_insert_traffic[7].is_null = 0;
	bind_insert_traffic[7].length = &record.l_url;

	bind_insert_traffic[8].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_traffic[8].buffer = record.authuser;
	bind_insert_traffic[8].buffer_length = record.l_authuser;
	bind_insert_traffic[8].is_null = 0;
	bind_insert_traffic[8].length = &record.l_authuser;

	if (mysql_stmt_bind_param(insert_traffic, bind_insert_traffic) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_traffic: %s", mysql_stmt_error(insert_traffic));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for select_resolved
	MySAR_print(MSG_DEBUG, "Configuring bindings for select_resolved...");
	if (!record.ipns) {
		MySAR_print(MSG_ERROR, "FATAL: record.ipns is NULL for select_resolved");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_select_resolved, 0, sizeof(bind_select_resolved));
	bind_select_resolved[0].buffer_type = MYSQL_TYPE_STRING;
	bind_select_resolved[0].buffer = record.ipns;
	bind_select_resolved[0].buffer_length = record.l_ipns;
	bind_select_resolved[0].is_null = 0;
	bind_select_resolved[0].length = &record.l_ipns;

	if (mysql_stmt_bind_param(select_resolved, bind_select_resolved) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for select_resolved: %s", mysql_stmt_error(select_resolved));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for insert_resolved
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_resolved...");
	if (!record.ipns || !record.hostname || !record.isResolved) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_resolved");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_resolved, 0, sizeof(bind_insert_resolved));
	bind_insert_resolved[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_resolved[0].buffer = record.ipns;
	bind_insert_resolved[0].buffer_length = record.l_ipns;
	bind_insert_resolved[0].is_null = 0;
	bind_insert_resolved[0].length = &record.l_ipns;

	bind_insert_resolved[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_resolved[1].buffer = record.hostname;
	bind_insert_resolved[1].buffer_length = record.l_hostname;
	bind_insert_resolved[1].is_null = 0;
	bind_insert_resolved[1].length = &record.l_hostname;

	bind_insert_resolved[2].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_resolved[2].buffer = record.isResolved;
	bind_insert_resolved[2].buffer_length = record.l_isResolved;
	bind_insert_resolved[2].is_null = 0;
	bind_insert_resolved[2].length = &record.l_isResolved;

	if (mysql_stmt_bind_param(insert_resolved, bind_insert_resolved) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_resolved: %s", mysql_stmt_error(insert_resolved));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for select_sites
	MySAR_print(MSG_DEBUG, "Configuring bindings for select_sites...");
	if (!record.date || !record.site) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for select_sites");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_select_sites, 0, sizeof(bind_select_sites));
	bind_select_sites[0].buffer_type = MYSQL_TYPE_STRING;
	bind_select_sites[0].buffer = record.date;
	bind_select_sites[0].buffer_length = record.l_date;
	bind_select_sites[0].is_null = 0;
	bind_select_sites[0].length = &record.l_date;

	bind_select_sites[1].buffer_type = MYSQL_TYPE_STRING;
	bind_select_sites[1].buffer = record.site;
	bind_select_sites[1].buffer_length = record.l_site;
	bind_select_sites[1].is_null = 0;
	bind_select_sites[1].length = &record.l_site;

	if (mysql_stmt_bind_param(select_sites, bind_select_sites) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for select_sites: %s", mysql_stmt_error(select_sites));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for insert_sites
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_sites...");
	if (!record.site || !record.date) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_sites");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_sites, 0, sizeof(bind_insert_sites));
	bind_insert_sites[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sites[0].buffer = record.site;
	bind_insert_sites[0].buffer_length = record.l_site;
	bind_insert_sites[0].is_null = 0;
	bind_insert_sites[0].length = &record.l_site;

	bind_insert_sites[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sites[1].buffer = record.date;
	bind_insert_sites[1].buffer_length = record.l_date;
	bind_insert_sites[1].is_null = 0;
	bind_insert_sites[1].length = &record.l_date;

	if (mysql_stmt_bind_param(insert_sites, bind_insert_sites) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_sites: %s", mysql_stmt_error(insert_sites));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for insert_users
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_users...");
	if (!record.authuser || !record.date) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_users");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_users, 0, sizeof(bind_insert_users));
	bind_insert_users[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_users[0].buffer = record.authuser;
	bind_insert_users[0].buffer_length = record.l_authuser;
	bind_insert_users[0].is_null = 0;
	bind_insert_users[0].length = &record.l_authuser;

	bind_insert_users[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_users[1].buffer = record.date;
	bind_insert_users[1].buffer_length = record.l_date;
	bind_insert_users[1].is_null = 0;
	bind_insert_users[1].length = &record.l_date;

	if (mysql_stmt_bind_param(insert_users, bind_insert_users) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_users: %s", mysql_stmt_error(insert_users));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for select_users
	MySAR_print(MSG_DEBUG, "Configuring bindings for select_users...");
	if (!record.date || !record.authuser) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for select_users");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_select_users, 0, sizeof(bind_select_users));
	bind_select_users[0].buffer_type = MYSQL_TYPE_STRING;
	bind_select_users[0].buffer = record.date;
	bind_select_users[0].buffer_length = record.l_date;
	bind_select_users[0].is_null = 0;
	bind_select_users[0].length = &record.l_date;

	bind_select_users[1].buffer_type = MYSQL_TYPE_STRING;
	bind_select_users[1].buffer = record.authuser;
	bind_select_users[1].buffer_length = record.l_authuser;
	bind_select_users[1].is_null = 0;
	bind_select_users[1].length = &record.l_authuser;

	if (mysql_stmt_bind_param(select_users, bind_select_users) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for select_users: %s", mysql_stmt_error(select_users));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for update_sums_in
	MySAR_print(MSG_DEBUG, "Configuring bindings for update_sums_in...");
	if (!record.bytes || !record.date || !record.ipns || !record.siteid || !record.usersid || !record.sumtime) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for update_sums_in");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_update_sums_in, 0, sizeof(bind_update_sums_in));
	bind_update_sums_in[0].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[0].buffer = record.bytes;
	bind_update_sums_in[0].buffer_length = record.l_bytes;
	bind_update_sums_in[0].is_null = 0;
	bind_update_sums_in[0].length = &record.l_bytes;

	bind_update_sums_in[1].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[1].buffer = record.date;
	bind_update_sums_in[1].buffer_length = record.l_date;
	bind_update_sums_in[1].is_null = 0;
	bind_update_sums_in[1].length = &record.l_date;

	bind_update_sums_in[2].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[2].buffer = record.ipns;
	bind_update_sums_in[2].buffer_length = record.l_ipns;
	bind_update_sums_in[2].is_null = 0;
	bind_update_sums_in[2].length = &record.l_ipns;

	bind_update_sums_in[3].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[3].buffer = record.siteid;
	bind_update_sums_in[3].buffer_length = record.l_siteid;
	bind_update_sums_in[3].is_null = 0;
	bind_update_sums_in[3].length = &record.l_siteid;

	bind_update_sums_in[4].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[4].buffer = record.usersid;
	bind_update_sums_in[4].buffer_length = record.l_usersid;
	bind_update_sums_in[4].is_null = 0;
	bind_update_sums_in[4].length = &record.l_usersid;

	bind_update_sums_in[5].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_in[5].buffer = record.sumtime;
	bind_update_sums_in[5].buffer_length = record.l_sumtime;
	bind_update_sums_in[5].is_null = 0;
	bind_update_sums_in[5].length = &record.l_sumtime;

	if (mysql_stmt_bind_param(update_sums_in, bind_update_sums_in) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for update_sums_in: %s", mysql_stmt_error(update_sums_in));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for update_sums_out
	MySAR_print(MSG_DEBUG, "Configuring bindings for update_sums_out...");
	if (!record.bytes || !record.date || !record.ipns || !record.siteid || !record.usersid || !record.sumtime) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for update_sums_out");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_update_sums_out, 0, sizeof(bind_update_sums_out));
	bind_update_sums_out[0].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[0].buffer = record.bytes;
	bind_update_sums_out[0].buffer_length = record.l_bytes;
	bind_update_sums_out[0].is_null = 0;
	bind_update_sums_out[0].length = &record.l_bytes;

	bind_update_sums_out[1].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[1].buffer = record.date;
	bind_update_sums_out[1].buffer_length = record.l_date;
	bind_update_sums_out[1].is_null = 0;
	bind_update_sums_out[1].length = &record.l_date;

	bind_update_sums_out[2].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[2].buffer = record.ipns;
	bind_update_sums_out[2].buffer_length = record.l_ipns;
	bind_update_sums_out[2].is_null = 0;
	bind_update_sums_out[2].length = &record.l_ipns;

	bind_update_sums_out[3].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[3].buffer = record.siteid;
	bind_update_sums_out[3].buffer_length = record.l_siteid;
	bind_update_sums_out[3].is_null = 0;
	bind_update_sums_out[3].length = &record.l_siteid;

	bind_update_sums_out[4].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[4].buffer = record.usersid;
	bind_update_sums_out[4].buffer_length = record.l_usersid;
	bind_update_sums_out[4].is_null = 0;
	bind_update_sums_out[4].length = &record.l_usersid;

	bind_update_sums_out[5].buffer_type = MYSQL_TYPE_STRING;
	bind_update_sums_out[5].buffer = record.sumtime;
	bind_update_sums_out[5].buffer_length = record.l_sumtime;
	bind_update_sums_out[5].is_null = 0;
	bind_update_sums_out[5].length = &record.l_sumtime;

	if (mysql_stmt_bind_param(update_sums_out, bind_update_sums_out) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for update_sums_out: %s", mysql_stmt_error(update_sums_out));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for insert_sums_in
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_sums_in...");
	if (!record.date || !record.ipns || !record.bytes || !record.siteid || !record.usersid || !record.sumtime) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_sums_in");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_sums_in, 0, sizeof(bind_insert_sums_in));
	bind_insert_sums_in[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[0].buffer = record.date;
	bind_insert_sums_in[0].buffer_length = record.l_date;
	bind_insert_sums_in[0].is_null = 0;
	bind_insert_sums_in[0].length = &record.l_date;

	bind_insert_sums_in[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[1].buffer = record.ipns;
	bind_insert_sums_in[1].buffer_length = record.l_ipns;
	bind_insert_sums_in[1].is_null = 0;
	bind_insert_sums_in[1].length = &record.l_ipns;

	bind_insert_sums_in[2].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[2].buffer = record.bytes;
	bind_insert_sums_in[2].buffer_length = record.l_bytes;
	bind_insert_sums_in[2].is_null = 0;
	bind_insert_sums_in[2].length = &record.l_bytes;

	bind_insert_sums_in[3].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[3].buffer = record.siteid;
	bind_insert_sums_in[3].buffer_length = record.l_siteid;
	bind_insert_sums_in[3].is_null = 0;
	bind_insert_sums_in[3].length = &record.l_siteid;

	bind_insert_sums_in[4].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[4].buffer = record.usersid;
	bind_insert_sums_in[4].buffer_length = record.l_usersid;
	bind_insert_sums_in[4].is_null = 0;
	bind_insert_sums_in[4].length = &record.l_usersid;

	bind_insert_sums_in[5].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_in[5].buffer = record.sumtime;
	bind_insert_sums_in[5].buffer_length = record.l_sumtime;
	bind_insert_sums_in[5].is_null = 0;
	bind_insert_sums_in[5].length = &record.l_sumtime;

	if (mysql_stmt_bind_param(insert_sums_in, bind_insert_sums_in) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_sums_in: %s", mysql_stmt_error(insert_sums_in));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for insert_sums_out
	MySAR_print(MSG_DEBUG, "Configuring bindings for insert_sums_out...");
	if (!record.date || !record.ipns || !record.bytes || !record.siteid || !record.usersid || !record.sumtime) {
		MySAR_print(MSG_ERROR, "FATAL: One or more record fields are NULL for insert_sums_out");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_insert_sums_out, 0, sizeof(bind_insert_sums_out));
	bind_insert_sums_out[0].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[0].buffer = record.date;
	bind_insert_sums_out[0].buffer_length = record.l_date;
	bind_insert_sums_out[0].is_null = 0;
	bind_insert_sums_out[0].length = &record.l_date;

	bind_insert_sums_out[1].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[1].buffer = record.ipns;
	bind_insert_sums_out[1].buffer_length = record.l_ipns;
	bind_insert_sums_out[1].is_null = 0;
	bind_insert_sums_out[1].length = &record.l_ipns;

	bind_insert_sums_out[2].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[2].buffer = record.bytes;
	bind_insert_sums_out[2].buffer_length = record.l_bytes;
	bind_insert_sums_out[2].is_null = 0;
	bind_insert_sums_out[2].length = &record.l_bytes;

	bind_insert_sums_out[3].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[3].buffer = record.siteid;
	bind_insert_sums_out[3].buffer_length = record.l_siteid;
	bind_insert_sums_out[3].is_null = 0;
	bind_insert_sums_out[3].length = &record.l_siteid;

	bind_insert_sums_out[4].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[4].buffer = record.usersid;
	bind_insert_sums_out[4].buffer_length = record.l_usersid;
	bind_insert_sums_out[4].is_null = 0;
	bind_insert_sums_out[4].length = &record.l_usersid;

	bind_insert_sums_out[5].buffer_type = MYSQL_TYPE_STRING;
	bind_insert_sums_out[5].buffer = record.sumtime;
	bind_insert_sums_out[5].buffer_length = record.l_sumtime;
	bind_insert_sums_out[5].is_null = 0;
	bind_insert_sums_out[5].length = &record.l_sumtime;

	if (mysql_stmt_bind_param(insert_sums_out, bind_insert_sums_out) != 0) {
		MySAR_print(MSG_ERROR, "FATAL: mysql_stmt_bind_param failed for insert_sums_out: %s", mysql_stmt_error(insert_sums_out));
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}

	// Configure bindings for output
	MySAR_print(MSG_DEBUG, "Configuring bindings for output...");
	if (!bind_data) {
		MySAR_print(MSG_ERROR, "FATAL: bind_data is NULL for output");
		MySAR_db_shutdown();
		MySAR_unlock_host();
		exit(EXIT_FAILURE);
	}
	memset(bind_output, 0, sizeof(bind_output));
	bind_output[0].buffer_type = MYSQL_TYPE_STRING;
	bind_output[0].buffer = bind_data;
	bind_output[0].buffer_length = 50;
	bind_output[0].is_null = 0;
	bind_output[0].length = &len[0];
}
