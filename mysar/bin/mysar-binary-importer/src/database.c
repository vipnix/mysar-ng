/*
 Program: mysar, File: database.c
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
#include <time.h>

#include "mysar.h"
#include "db_layout.h"

extern MYSQL	*mysql;

// Tables to clean in 2.x version
char *cleanTables[] = { "sites", "traffic", "trafficSummaries", "users", "traffic_daily_summary", "trafficSummaries_daily" };

void MySAR_db_startup()
{
    // Establish our connection to the MySQL Server.
    mysql = mysql_init(NULL);
    if (!mysql) {
        MySAR_print(MSG_ERROR, "FATAL: mysql_init() failed: %s", mysql_error(NULL));
        MySAR_unlock_host();
        exit(EXIT_FAILURE);
    }

    // Set connection options for compatibility
    mysql_options(mysql, MYSQL_OPT_RECONNECT, &(my_bool){1});
    if (!mysql_real_connect(mysql, config->dbserver, config->dbuser, config->dbpass, config->dbname, 0, NULL, CLIENT_FOUND_ROWS)) {
        MySAR_print(MSG_ERROR, "FATAL: mysql_real_connect() failed: %s", mysql_error(mysql));
        mysql_close(mysql);
        MySAR_unlock_host();
        exit(EXIT_FAILURE);
    }

    MySAR_print(MSG_DEBUG, "Connection established to MySQL server with enhanced options.");
    config->db_conn_open = 1;
}

void MySAR_db_rollback()
{
    if (mysql_rollback(mysql))
    {
        printf("Argggghhh! Error!!! Can't rollback -> %s\n", mysql_error(mysql));
    }
}

void MySAR_db_shutdown()
{
    mysql_close(mysql);
}

void MySAR_db_create()
{
    unsigned int i;
    char sql[512];
    char mysql_pwd[50], mysql_user[50], mysql_host[50], mysql_database[50], mysql_client[50];
    char mysar_pwd[50], mysar_user[50], mysar_grant[50];

    MySAR_print(MSG_NOTICE, "WARNING!! This will generate a new database for storing the logs.");
    MySAR_print(MSG_NOTICE, "Any existing database with the same name, will be dropped!!");
    MySAR_print(MSG_NOTICE, "You need to supply MySQL administrative user, and password.\n");
    MySAR_print(MSG_NOTICE, "If your server is running on another machine, remember to supply the correct hostname for this machine.");
    MySAR_print(MSG_NOTICE, "MySQL needs to this information to allow remote connection to the database. incorrect parameters will result in failure.");
    MySAR_print(MSG_NOTICE, "Be careful when you are behind a NATed server. MySQL server will see only your external IP.\n");
    MySAR_print(MSG_NOTICE, "Only grant permissions to database if you have permission to do it. If you dont have, choose no.");
    MySAR_print(MSG_NOTICE, "Leaving fields in blank, the default values will be taken from config file, except for the MySQL Admin password.\n");

    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Enter MySQL administrative User:     (default: root) ");			MySAR_readconsole(mysql_user);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Enter MySQL administrative Password: (default: blank) ");		MySAR_readconsole(mysql_pwd);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Location of the database server:     (default: %s) ", config->dbserver);	MySAR_readconsole(mysql_host);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "This Machine Hostname or IP:         (default: localhost) ");		MySAR_readconsole(mysql_client);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Database name to create:             (default: %s) ", config->dbname);	MySAR_readconsole(mysql_database);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "MySAR database username:             (default: %s) ", config->dbuser);	MySAR_readconsole(mysar_user);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "MySAR database password:             (default: %s) ", config->dbpass);	MySAR_readconsole(mysar_pwd);
    MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Grant permissions on database?	    (default: yes) ");			MySAR_readconsole(mysar_grant);

    if (mysql_user[0]=='\0') strncpy(mysql_user, "root", sizeof(mysql_user));
    if (mysql_host[0]=='\0') strncpy(mysql_host, config->dbserver, sizeof(mysql_host));
    if (mysql_database[0]=='\0') strncpy(mysql_database, config->dbname, sizeof(mysql_database));
    if (mysql_client[0]=='\0') strncpy(mysql_client, "localhost", sizeof(mysql_client));

    if (mysar_user[0]=='\0') strncpy(mysar_user, config->dbuser, sizeof(mysar_user));
    if (mysar_pwd[0]=='\0') strncpy(mysar_pwd, config->dbpass, sizeof(mysar_pwd));
    if (mysar_grant[0]=='\0') strncpy(mysar_grant, "yes", sizeof(mysar_grant));

    // Establish our connection to the MySQL Server.
    mysql = mysql_init(NULL);
    if (!mysql_real_connect(mysql, mysql_host, mysql_user, mysql_pwd, NULL, 0, NULL, 0))
        MySAR_print(MSG_ERROR, "Error connection to the server! MySQL reported: %s", mysql_error(mysql));

    MySAR_print(MSG_NOTICE, "\nDropping any existing databases..");

    snprintf(sql, sizeof(sql), "DROP DATABASE IF EXISTS %s", mysql_database);
    MySAR_push_query(sql);
    snprintf(sql, sizeof(sql), "CREATE DATABASE %s", mysql_database);
    MySAR_push_query(sql);

    // quit if could not select database
    if (mysql_select_db(mysql, mysql_database))
        MySAR_print(MSG_ERROR, "Could not select the database!");

    MySAR_print(MSG_NOTICE, "Generating tables...");
    // generate db structure
    for (i=0;i<=sizeof(db_default_tables)/BITSHIFT-1;i++)
        MySAR_push_query((char *)db_default_tables[i]);

    MySAR_print(MSG_NOTICE, "Setting default values...");
    // insert default values
    for (i=0;i<=sizeof(db_default_values)/BITSHIFT-1;i++)
        MySAR_push_query((char *)db_default_values[i]);

    if (strcasecmp(mysar_grant, "yes")==0)
    {
        snprintf(sql, sizeof(sql), "GRANT ALL ON %s.* TO %s@%s IDENTIFIED BY '%s'", mysql_database, mysar_user, mysql_client, mysar_pwd);
        MySAR_push_query(sql);

        // reload privileges tables
        snprintf(sql, sizeof(sql), "FLUSH PRIVILEGES");
        MySAR_push_query(sql);

        MySAR_print(MSG_NOTICE, "Done!");
    }

    MySAR_db_shutdown();

    // bye!!
    exit(EXIT_SUCCESS);
}

void MySAR_db_cleanup()
{
    char cleantill[15];
    int keepdays;
    char query[512];
    char today[11] = {0};
    unsigned int cleanTablesCount;
    struct tm t_result;
    time_t time_tm_cleanup;
    long int total_affected_rows = 0;

    // Lista de tabelas para limpar, incluindo tabelas de resumo
    char *cleanTables[] = { "sites", "traffic", "trafficSummaries", "users", "traffic_daily_summary", "trafficSummaries_daily" };
    int num_clean_tables = sizeof(cleanTables) / sizeof(cleanTables[0]);

    long int config_int_hist = strtol(config->historydays, NULL, 0);

    // Get today's Date
    time_tm_cleanup = MySAR_current_time();
    localtime_r(&time_tm_cleanup, &t_result);

    strftime(today, sizeof(today), "%Y-%m-%d", &t_result);

    // Calculate the date difference (Keep time)
    time_tm_cleanup = time_tm_cleanup - (config_int_hist * 86400);

    MySAR_print(MSG_NOTICE, "Last Database cleanup performed on %s", config->lastcleanup);
    MySAR_print(MSG_NOTICE, "History keep days: %s", config->historydays);
    MySAR_print(MSG_NOTICE, "Current Date %s", today);

    if (strcmp(today, config->lastcleanup) != 0)
    {
        localtime_r(&time_tm_cleanup, &t_result);
        strftime(cleantill, sizeof(cleantill), "%Y-%m-%d", &t_result);

        MySAR_print(MSG_NOTICE, "\nDatabase Cleanup. Removing entries dated back to %s", cleantill);

        // Verificar conexão MySQL
        if (mysql_ping(mysql)) {
            MySAR_print(MSG_ERROR, "MySQL connection lost: %s\n", mysql_error(mysql));
            return;
        }

        // Verificar dados antes da exclusão
        for (cleanTablesCount = 0; cleanTablesCount < num_clean_tables; cleanTablesCount++)
        {
            memset(&query, 0, sizeof(query));
            snprintf(query, sizeof(query), "SELECT COUNT(*) AS count FROM %s WHERE date < '%s'", cleanTables[cleanTablesCount], cleantill);
            MySAR_print(MSG_DEBUG, "Checking rows: %s\n", query);
            if (mysql_query(mysql, query)) {
                MySAR_print(MSG_ERROR, "Failed to check %s: %s\n", cleanTables[cleanTablesCount], mysql_error(mysql));
            } else {
                MYSQL_RES *result = mysql_store_result(mysql);
                if (result) {
                    MYSQL_ROW row = mysql_fetch_row(result);
                    MySAR_print(MSG_DEBUG, "Table %s has %s rows to delete before %s\n", cleanTables[cleanTablesCount], row[0], cleantill);
                    mysql_free_result(result);
                }
            }
        }

        // Limpar cada tabela
        for (cleanTablesCount = 0; cleanTablesCount < num_clean_tables; cleanTablesCount++)
        {
            memset(&query, 0, sizeof(query));
            snprintf(query, sizeof(query), "DELETE FROM %s WHERE date < '%s' AND date IS NOT NULL", cleanTables[cleanTablesCount], cleantill);
            MySAR_print(MSG_DEBUG, "Executing query: %s\n", query);

            if (mysql_query(mysql, query)) {
                MySAR_print(MSG_ERROR, "Failed to clean %s: %s\n", cleanTables[cleanTablesCount], mysql_error(mysql));
            } else {
                unsigned long affected_rows = mysql_affected_rows(mysql);
                total_affected_rows += affected_rows;
                MySAR_print(MSG_NOTICE, "Table: %17s Affected Rows: %5lu\n", cleanTables[cleanTablesCount], affected_rows);
            }
        }

        // Atualizar lastCleanUp apenas se alguma linha foi afetada
        if (total_affected_rows > 0) {
            snprintf(query, sizeof(query), "UPDATE config SET value = '%s' WHERE name = 'lastCleanUp'", today);
            if (mysql_query(mysql, query)) {
                MySAR_print(MSG_ERROR, "Failed to update lastCleanUp: %s\n", mysql_error(mysql));
            } else {
                MySAR_print(MSG_DEBUG, "Updated lastCleanUp to %s\n", today);
            }
        } else {
            MySAR_print(MSG_NOTICE, "No rows were deleted during cleanup. Check data integrity or date values.\n");
        }

        MySAR_print(MSG_NOTICE, "Finished cleanup routine.\n");

        // increase db optimizer counter
        config->optimize_count++;

        keepdays = atoi(config->historydays);
        if (config->optimize_count >= (long)keepdays)
        {
            config->optimize_count = 0;
            MySAR_print(MSG_NOTICE, "Automatic database Optimize will run now.");
            MySAR_print(MSG_NOTICE, "Database reached %d days without optimization", keepdays);

            // run optimization
            MySAR_db_optimize();
        }

        MySAR_update_config_long(config->optimize_count, "optimizeCounter");
    }
}

void MySAR_db_optimize()
{
    unsigned int optimizeTablesCount;
    char query[512];

    MySAR_print(MSG_NOTICE, "\nDatabase Optimize is in progress...");
    for (optimizeTablesCount = 0; optimizeTablesCount <= (sizeof(cleanTables) / BITSHIFT - 1); optimizeTablesCount++)
    {
        snprintf(query, sizeof(query), "OPTIMIZE TABLE %s", cleanTables[optimizeTablesCount]);
        MySAR_print(MSG_NOTICE | MSG_NO_CRLF, "Table: %17s Optimization... ", cleanTables[optimizeTablesCount]);

        // push query and free
        MySAR_push_query_free(query);
        MySAR_print(MSG_NOTICE, "Done!");
    }

    MySAR_print(MSG_NOTICE, "Finished optimization routine.\n");
}
