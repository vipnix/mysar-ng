#!/bin/bash

DATE=`date +'%Y-%m-%d'`
MES=`date +'%b-%Y'`
INICIOMES=`date +'01/%m/%Y'`
FLAGDAY=`date +%d -d  tomorrow`
#HOJE=`date +'%d/%m/%Y'`
ROOTDIR="/var/log/squid"
DATE=$(date +'%Y-%m-%d')
DATE_MES=$(date +'%Y-%m')
REPORTMENSALDIR="/srv/www/htdocs/squid-reports-mensal"
CONFDIR="/srv/www/htdocs/mysar/bin"

MES=05
ANO=2014
MENSALDIR="${ROOTDIR}/${ANO}-${MES}"

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
#if [ "$FLAGDAY" = "01" ]; then
	concatena_logs
	# Gera logs
	sarg -f ${CONFDIR}/sarg-mensal.conf -d 01/${MES}/${ANO}-31/${MES}/${ANO} -l ${MENSALDIR}/access.log-full -x > ${MENSALDIR}/sarg.log 2>&1
	rm ${MENSALDIR}/access.log-full
	echo "DirectoryIndex index.html" > ${REPORTMENSALDIR}/.htaccess
	
	# ajusta permissão dos diretorios
	chown apache.apache -R ${REPORTMENSALDIR}
#fi

# fim
