#!/bin/sh

DATE=`date '+%Y%m%d'`

while true 
   do
      #/usr/local/bin/php cobra_report.php >> logs/cobra_report-$DATE.txt 
      /usr/bin/curl http://www.supersoccer.co.id/sscrregion1/getfm > /dev/null
      sleep 5 
done

