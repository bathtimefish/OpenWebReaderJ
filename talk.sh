#!/bin/sh
VOICE=/home/ubuntu/bin/hts_voice_nitech_jp_atr503_m001-1.02
TMP_DIR=/var/www/owr/tmp
echo $1 | open_jtalk \
-td $VOICE/tree-dur.inf \
-tf $VOICE/tree-lf0.inf \
-tm $VOICE/tree-mgc.inf \
-md $VOICE/dur.pdf \
-mf $VOICE/lf0.pdf \
-mm $VOICE/mgc.pdf \
-df $VOICE/lf0.win1 \
-df $VOICE/lf0.win2 \
-df $VOICE/lf0.win3 \
-dm $VOICE/mgc.win1 \
-dm $VOICE/mgc.win2 \
-dm $VOICE/mgc.win3 \
-ef $VOICE/tree-gv-lf0.inf \
-em $VOICE/tree-gv-mgc.inf \
-cf $VOICE/gv-lf0.pdf \
-cm $VOICE/gv-mgc.pdf \
-k  $VOICE/gv-switch.inf \
-x /usr/local/dic \
-ow $TMP_DIR/$2.wav \
-ot $TMP_DIR/$2.log

