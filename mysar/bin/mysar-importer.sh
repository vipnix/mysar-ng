#!/bin/bash


test_running() {
        RUNNING=$(ps auxw | grep -w \/usr\/bin\/mysar|grep -v mysar-run.sh|grep -v grep| wc -l)
        if [ ${RUNNING} -ge 1 ]; then
                echo "/usr/bin/mysar rodando, saindo imediatamente"
                exit 1
        fi
}

test_running

test_running2() {
        RUNNING=$(ps aux | grep "$(printf '%s\n' "${0##*/}")" | grep bash | grep -v "bash -c" | grep -v $$ | grep -v grep | wc -l)
        if [ ${RUNNING} -gt 1 ]; then
                echo "Script ja esta rodando, aguardando 10 segundos para tentar novamente."
                sleep 10
                RUNNING=$(ps aux | grep "$(printf '%s\n' "${0##*/}")" | grep bash | grep -v "bash -c" | grep -v $$ | grep -v grep | wc -l)
                if [ ${RUNNING} -gt 1 ]; then
                        echo "$(date) - Script ja esta rodando, nao sera executado novamente." > /var/log/mysar-importer.log
                        exit 1
                fi
        fi
}

test_running2

test_running3() {
        RUNNING=$(ps auxw | grep -w \/usr\/bin\/mysqldump|grep -v grep| wc -l)
        if [ ${RUNNING} -ge 1 ]; then
                echo "/usr/bin/mysqldump rodando, saindo imediatamente"
                exit 1
        fi
}

test_running3
###############################################################################
# Iniciando script
###############################################################################
# Iniciando script
CHECK="$(/usr/bin/mysar |grep -vi 'errors: 0'|grep -i error|wc -l)"
if [ "${CHECK}" -ne 0 ]; then
	php /var/www/html/mysar/bin/mysar-importer.php
	echo php
fi

