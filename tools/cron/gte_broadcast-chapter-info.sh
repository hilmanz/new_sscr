#!/bin/sh
#######################################
## Broadcast Chapter Information     ##
## Ver 0.1                           ##
## isngadi.nurjaman@kana.co.id       ##
## 18 August 2015                    ##
#######################################
##
## 20150818 : - Initial scripts
##
##
##


## Configuration
REGION='region1'

# Direktori dimana script ini disimpan
BASEDIR="/home/gte/$REGION/tools/cron"

# File-file konfigurasi
TEMPLATE="/home/gte/$REGION/tools/conf/template_email_info.txt"

LOCK_FILE="$BASEDIR/logs/lock_chap-info"

# Database
USER="root"
PASS="em3dbroot"
IP="10.18.69.2"
DB="sscr_$REGION"
DIR="/home/gte/$REGION/tools"

# Email
FROM='Supersoccer Community Race <sscr-admin@supersoccer.co.id>'
SUBJECT='Info Supersoccer Community Race'
ATTACHEMENT=@/home/gte/$REGION/tools/conf/SSCR-Sosialisasi_Region_1_FINAL.pptx

## Scripts

cd $BASEDIR

#--Cek lock file, kalau tidak ada buat dan jalankan script, kalau tidak ada mati--#
PROC=$(cat $LOCK_FILE)

if [ "$PROC" != "" ]; then
   exit 1
fi

echo "running" > $LOCK_FILE

#--Run Script--#

mysql -u $USER -p$PASS -h $IP -D $DB -Bse "select id from ss_invitation_chapter where n_status=1;" > logs/chapter_id.txt

for ID in `cat logs/chapter_id.txt`
do
    ## Collecting Data from Database
    EMAIL=$(mysql -u $USER -p$PASS -h $IP -D $DB -Bse "select chapter_head_email from ss_invitation_chapter where id = $ID;")
	
    ## Send Email
    TEMPLATE_NEW=$(cat $TEMPLATE)
    #echo $SUBJECT_NEW
	
    curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' \
    https://api.mailgun.net/v3/gte.supersoccer.co.id/messages \
    -F from='Supersoccer Community Race <sscr-admin@supersoccer.co.id>' \
    -F to="$EMAIL" \
    -F subject="$SUBJECT" \
    --form-string html="$TEMPLATE_NEW" \
    -F attachment=$ATTACHEMENT \
    -F o:campaign='fkdf5'

     mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_chapter set n_status='2' where id = $ID;"
    
     sleep 5

     STATUS=$(curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' -G -d "recipient=$EMAIL&limit=1" https://api.mailgun.net/v3/gte.supersoccer.co.id/campaigns/fkdf5/events | grep '"event": "delivered"' | awk -F: {'print $8'} | awk -F'"' {'print $2'})
     echo $STATUS
     if [[ "$STATUS" != "" ]]; then
        mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_chapter set status_email='1' where id = $ID;"
        echo $EMAIL "=" $STATUS
     fi

     STATUS=$(curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' -G -d "recipient=$EMAIL&limit=1" https://api.mailgun.net/v3/gte.supersoccer.co.id/campaigns/fkdf5/events | grep '"event": "opened"' | awk -F: {'print $8'} | awk -F'"' {'print $2'})
     if [[ "$STATUS" != "" ]]; then
        mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_chapter set status_email='2' where id = $ID;"
        echo $EMAIL "=" $STATUS
     fi

     STATUS=$(curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' -G -d "recipient=$EMAIL&limit=1" https://api.mailgun.net/v3/gte.supersoccer.co.id/campaigns/fkdf5/events | grep '"event": "bounced"' | awk -F: {'print $11'} | awk -F'"' {'print $2'})
     if [[ "$STATUS" != "" ]]; then
        mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_chapter set status_email='3' where id = $ID;"
        echo $EMAIL "=" $STATUS
     fi

     STATUS=$(curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' -G -d "recipient=$EMAIL&limit=1" https://api.mailgun.net/v3/gte.supersoccer.co.id/campaigns/fkdf5/events | grep '"event": "clicked"' | awk -F: {'print $13'} | awk -F'"' {'print $2'})
     if [[ "$STATUS" != "" ]]; then
        mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_chapter set status_email='4' where id = $ID;"
        echo $EMAIL "=" $STATUS
     fi

done

##--Proses selesai, hapus status lock--##
cat /dev/null > $LOCK_FILE
