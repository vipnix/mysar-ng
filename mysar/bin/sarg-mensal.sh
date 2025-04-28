#!/bin/bash

# 00 23 28-31 * * root /srv/www/htdocs/mysar/bin/sarg-mensal.sh

DATE=`date +'%Y-%m-%d'`
MES=`date +'%b-%Y'`
INICIOMES=`date +'01/%m/%Y'`
FLAGDAY=`date +%d -d  tomorrow`
HOJE=`date +'%d/%m/%Y'`
ROOTDIR="/var/log/squid"
DATE=$(date +'%Y-%m-%d')
DATE_MES=$(date +'%Y-%m')
MENSALDIR="${ROOTDIR}/${DATE_MES}"
REPORTMENSALDIR="/srv/www/htdocs/squid-reports-mensal"
CONFDIR="/srv/www/htdocs/mysar/bin"

mkdir -p /tmp/sarg-mensal

# cria diretorio caso não exista
if [ ! -d ${REPORTMENSALDIR} ]; then
        mkdir -p ${REPORTMENSALDIR}
fi

concatena_logs () {
ls -1 ${MENSALDIR}/*gz | sort > ${MENSALDIR}/lista
rm -rf ${MENSALDIR}/access.log-full
	while read arquivo_log;do
		zcat ${arquivo_log} >> ${MENSALDIR}/access.log-full
	done < ${MENSALDIR}/lista
rm ${MENSALDIR}/lista
}



# Cria relatorio mensal apenas se for o ultimo dia do mês
if [ "$FLAGDAY" = "01" ]; then
	concatena_logs
	# Gera logs
	sarg -f ${CONFDIR}/sarg-mensal.conf -d $INICIOMES-$HOJE -l ${MENSALDIR}/access.log-full -x > ${MENSALDIR}/sarg.log 2>&1
	rm ${MENSALDIR}/access.log-full
	echo "DirectoryIndex index.html" > ${REPORTMENSALDIR}/.htaccess
	
	# ajusta permissão dos diretorios
	chown wwwrun. -R ${REPORTMENSALDIR}
#iconv -f utf-8 -t latin1 ${REPORTMENSALDIR}/index.html > ${REPORTSEMANALDIR}/index.html2
fi

# fim
/opt/vipnix/scripts/fix-perms.sh
