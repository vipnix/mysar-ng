#!/bin/bash

LOGDIR="/var/log/squid"
OUTFILE="/tmp/access.log-last40days.concat"
CUTOFF_DATE=$(date -d "-40 days" +%Y%m%d)

> "$OUTFILE"

echo "Buscando logs de até 40 dias atrás..."

# Encontra todos os arquivos access.log-* (recursivamente)
find "$LOGDIR" -type f -name 'access.log-*' | while read -r file; do
    # Extrai a data do nome (formato pode ser YYYYMMDD ou DD-MM-YYYY)
    base=$(basename "$file")

    if [[ $base =~ access\.log-([0-9]{8}) ]]; then
        logdate="${BASH_REMATCH[1]}"
    elif [[ $base =~ access\.log-([0-9]{2})-([0-9]{2})-([0-9]{4}) ]]; then
        logdate="${BASH_REMATCH[3]}${BASH_REMATCH[2]}${BASH_REMATCH[1]}"
    else
        echo "Formato desconhecido: $file"
        continue
    fi

    if [[ $logdate -ge $CUTOFF_DATE ]]; then
        echo "$logdate $file"
    fi
done | sort | cut -d' ' -f2- | while read -r sortedfile; do
    echo "Concatenando: $sortedfile"
    case "$sortedfile" in
        *.gz)  gzcat "$sortedfile" >> "$OUTFILE" ;;
        *.xz)  xzcat "$sortedfile" >> "$OUTFILE" ;;
        *.bz2) bzcat "$sortedfile" >> "$OUTFILE" ;;
        *)     cat "$sortedfile" >> "$OUTFILE" ;;
    esac
done

echo "Concatenação finalizada em: $OUTFILE"
