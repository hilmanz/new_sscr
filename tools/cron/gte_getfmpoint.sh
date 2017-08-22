#!/bin/sh

PID=$(ps -ef | grep sscrregion1/getfm | grep -v grep | awk '{print $2}')
if [ "$PID" = "" ]; then
        echo "RUN getfm for region1"
        /usr/bin/curl http://www.supersoccer.co.id/sscrregion1/getfm > /dev/null &
fi

PID=$(ps -ef | grep sscrregion2/getfm | grep -v grep | awk '{print $2}')
if [ "$PID" = "" ]; then
        echo "RUN getfm for region2"
        /usr/bin/curl http://www.supersoccer.co.id/sscrregion2/getfm > /dev/null &
fi
