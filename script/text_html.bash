#!/bin/bash

tempFile=./tempFile.$(date +%s).temp

if [[ $# != 1 ]]
then
    echo "SYNTAX: $0 url"
    echo
    echo "For instance:"
    echo "    $0 http://beauteparislumiere.com"
    exit 1
fi

wget $1 -O $tempFile -o /dev/null

html=$(cat $tempFile | wc -c)
text=$(cat $tempFile | sed 's/<[^>]\+>//g' | wc -c)
ratio=$(expr 100 \* $text \/ $html)

echo $ratio

rm -rf $tempFile
