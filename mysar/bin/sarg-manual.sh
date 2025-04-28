#!/bin/bash

# 00 23 28-31 * * root /srv/www/htdocs/mysar/bin/sarg-manual.sh

DATE=`date +'%Y-%m-%d'`
MES=`date +'%b-%Y'`
INICIOMES=`date +'01/%m/%Y'`
FLAGDAY=`date +%d -d  tomorrow`
HOJE=`date +'%d/%m/%Y'`
ROOTDIR="/var/log/squid"
DATE=$(date +'%Y-%m-%d')
DATE_MES=$(date +'%Y-%m')
MANUALDIR="${ROOTDIR}/${DATE_MES}"
REPORTMANUALDIR="/srv/www/htdocs/squid-reports-manual"
CONFDIR="/srv/www/htdocs/mysar/bin"
YESTERDAY=$(date --date "0 day ago" +%d/%m/%Y)
LASTWEEK=$(date --date "7 day ago" +%d/%m/%Y)

mkdir -p /tmp/sarg-manual

# cria diretorio caso não exista
if [ ! -d ${REPORTMANUALDIR} ]; then
        mkdir -p ${REPORTMANUALDIR}
fi

concatena_logs () {
ls -1rht ${MANUALDIR}/*gz |tail -10| sort > ${MANUALDIR}/lista
rm -rf ${MANUALDIR}/access.log-full
        while read arquivo_log;do
                zcat ${arquivo_log} >> ${MANUALDIR}/access.log-manual
        done < ${MANUALDIR}/lista
rm ${MANUALDIR}/lista
}


#concatena_logs
# Gera logs
sarg -f ${CONFDIR}/sarg-manual.conf -d 07/02/2025-14/02/2025 -l /root/log-erik -x > /root/sarg.log 2>&1
rm ${MANUALDIR}/access.log-manual
echo "DirectoryIndex index.html" > ${REPORTMANUALDIR}/.htaccess

# ajusta permissão dos diretorios
chown wwwrun: -R ${REPORTMANUALDIR}

#iconv -f utf-8 -t latin1 ${REPORTMANUALDIR}/index.html > ${REPORTMANUALDIR}/index.html2
#mv ${REPORTMANUALDIR}/index.html ${REPORTMANUALDIR}/index.html.bkp
#mv ${REPORTMANUALDIR}/index.html2 ${REPORTMANUALDIR}/index.html

# fim

/opt/vipnix/scripts/fix-perms.sh
