<?
# Open Web Reader Core Test 0.01
$SYSTEM_DIR = '/var/www/owr';
$TMP_DIR = $SYSTEM_DIR . '/tmp';

$FileName = uniqid();

$callbackId = $_GET['callback'];
$text = urldecode($_GET['text']);

# 1. phantomjs
# $cmd = $SYSTEM_DIR . '/phantom.sh ' . $FileName;
# $success = exec($cmd, $result);

# $fp = fopen($TMP_DIR.'/'.$FileName.'.txt', 'r');
# $text = null;
# while( !feof($fp) ){
#   $text = fgetss($fp, 4096);
# }
# fclose($fp);
# var_dump($text);

# 2. open_jtalk
$cmd = $SYSTEM_DIR . '/talk.sh "' . $text . '" ' . $FileName;
$success = exec($cmd, $result);

# 3. ffmpeg
$cmd = $SYSTEM_DIR . '/ffmpeg_enc.sh ' . $FileName;
$success = exec($cmd, $result);

# 4. JSONize
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'];
$arrRes['audios'] = array(
  'mp4' => $baseUrl.'/owr/audios/'.$FileName.'.mp4',
  'ogg' => $baseUrl.'/owr/audios/'.$FileName.'.ogg'
);
$response = json_encode( $arrRes );

echo $callbackId . '(' . $response . ')';

?>
