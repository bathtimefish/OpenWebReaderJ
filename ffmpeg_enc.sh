#!/bin/sh

SYSTEM_DIR=/home/ubuntu/bin/ffmpeg
TMP_DIR=/var/www/owr/tmp
AUDIO_DIR=/var/www/owr/audios

$SYSTEM_DIR/ffmpeg -i $TMP_DIR/$1.wav -acodec vorbis -strict experimental -vn -ac 2 -aq 24 $AUDIO_DIR/$1.ogg
$SYSTEM_DIR/ffmpeg -i $TMP_DIR/$1.wav -acodec aac -strict experimental -vn -ac 2 -aq 24 $AUDIO_DIR/$1.mp4
