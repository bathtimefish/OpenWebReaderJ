#!/bin/sh

SYSTEM_DIR=/home/ubuntu/bin/phantomjs/bin
TMP_DIR=/var/www/owr/tmp
SCRIPT_DIR=/var/www/owr

Xvfb :2 -screen 0 800x600x24 2> /dev/null &
export DISPLAY=:2.0

$SYSTEM_DIR/phantomjs $SCRIPT_DIR/hello.js | cat > $TMP_DIR/$1.txt

