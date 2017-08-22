#!/bin/sh
#######################################
## Broadcast Chapter Registration    ##
## With Member Registration Template ##
## Ver 0.1                           ##
## isngadi.nurjaman@kana.co.id       ##
## 10 August 2015                    ##
#######################################
##
## 20150810 : - Initial scripts
##
##
##


## Configuration
REGION='region1'

# Direktori dimana script ini disimpan
BASEDIR="/home/gte/$REGION/tools/cron"

# File-file konfigurasi
TEMPLATE="/home/gte/$REGION/tools/conf/template_email_invitation-member.txt"
TEMPLATE_OUTPUT="/home/gte/$REGION/tools/conf/template_email_output-member.txt"

LOCK_FILE="$BASEDIR/logs/lock_member-reg"

# Database
USER="root"
PASS="em3dbroot"
IP="10.18.69.2"
DB="sscr_$REGION"
DIR="/home/gte/$REGION/tools"

# Email
FROM='Supersoccer Community Race <sscr-admin@supersoccer.co.id>'
SUBJECT='Supersoccer Community Race - Voucher Football Manager'

## Scripts

cd $BASEDIR

#--Cek lock file, kalau tidak ada buat dan jalankan script, kalau tidak ada mati--#
PROC=$(cat $LOCK_FILE)

if [ "$PROC" != "" ]; then
   exit 1
fi

echo "running" > $LOCK_FILE

#--Run Script--#

mysql -u $USER -p$PASS -h $IP -D $DB -Bse "select id from ss_invitation_member where n_status=0;" > logs/member_id.txt

for ID in `cat logs/member_id.txt`
do
    ## Collecting Data from Database
    EMAIL=$(mysql -u $USER -p$PASS -h $IP -D $DB -Bse "select email from ss_invitation_member where id = $ID;")
    NAME=$(mysql -u $USER -p$PASS -h $IP -D $DB -Bse "select name from ss_invitation_member where id = $ID;")
	
    ## Replace Parameter Name
    sed "s/!#name/$NAME/g" $TEMPLATE > $TEMPLATE_OUTPUT

    ## Send Email
    TEMPLATE_NEW=$(cat $TEMPLATE_OUTPUT)
    #echo $SUBJECT_NEW
	
    curl -s --user 'api:key-031f6c645c2c27d331e152ba8a959e28' \
    https://api.mailgun.net/v3/gte.supersoccer.co.id/messages \
    -F from='Supersoccer Community Race <sscr-admin@supersoccer.co.id>' \
    -F to="$EMAIL" \
    -F subject="$SUBJECT" \
    --form-string html="$TEMPLATE_NEW" \
    -F o:campaign='fkdf5'
    
    mysql -u $USER -p$PASS -h $IP -D $DB -Bse "update ss_invitation_member set n_status='1' where id = $ID;"

done

##--Proses selesai, hapus status lock--##
cat /dev/null > $LOCK_FILE
