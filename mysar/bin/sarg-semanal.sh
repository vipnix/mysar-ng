#!/bin/bash

# 00 23 28-31 * * root /srv/www/htdocs/mysar/bin/sarg-semanal.sh

DATE=`date +'%Y-%m-%d'`
MES=`date +'%b-%Y'`
INICIOMES=`date +'01/%m/%Y'`
FLAGDAY=`date +%d -d  tomorrow`
HOJE=`date +'%d/%m/%Y'`
ROOTDIR="/var/log/squid"
DATE=$(date +'%Y-%m-%d')
DATE_MES=$(date +'%Y-%m')
SEMANALDIR="${ROOTDIR}/${DATE_MES}"
REPORTSEMANALDIR="/srv/www/htdocs/squid-reports-semanal"
CONFDIR="/srv/www/htdocs/mysar/bin"
YESTERDAY=$(date --date "0 day ago" +%d/%m/%Y)
LASTWEEK=$(date --date "7 day ago" +%d/%m/%Y)

mkdir -p /tmp/sarg-semanal

# cria diretorio caso não exista
if [ ! -d ${REPORTSEMANALDIR} ]; then
        mkdir -p ${REPORTSEMANALDIR}
fi

concatena_logs () {
ls -1rht ${SEMANALDIR}/*gz |tail -10| sort > ${SEMANALDIR}/lista
rm -rf ${SEMANALDIR}/access.log-full
        while read arquivo_log;do
                zcat ${arquivo_log} >> ${SEMANALDIR}/access.log-semanal
        done < ${SEMANALDIR}/lista
rm ${SEMANALDIR}/lista
}


concatena_logs
# Gera logs
sarg -f ${CONFDIR}/sarg-semanal.conf -d $LASTWEEK-$YESTERDAY -l ${SEMANALDIR}/access.log-semanal -x > ${SEMANALDIR}/sarg.log 2>&1
rm ${SEMANALDIR}/access.log-semanal
echo "DirectoryIndex index.html" > ${REPORTSEMANALDIR}/.htaccess

# ajusta permissão dos diretorios
chown wwwrun. -R ${REPORTSEMANALDIR}

#iconv -f utf-8 -t latin1 ${REPORTSEMANALDIR}/index.html > ${REPORTSEMANALDIR}/index.html2
#mv ${REPORTSEMANALDIR}/index.html ${REPORTSEMANALDIR}/index.html.bkp
#mv ${REPORTSEMANALDIR}/index.html2 ${REPORTSEMANALDIR}/index.html

# fim

/opt/vipnix/scripts/fix-perms.sh
