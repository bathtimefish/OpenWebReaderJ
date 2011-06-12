<?
// Open Web Reader Core Test 0.01
$SYSTEM_DIR = '/var/www/owr';
$TMP_DIR = $SYSTEM_DIR . '/tmp';

$FileName = uniqid();

$callbackId = $_GET['callback'];
$text = urldecode($_GET['text']);
$apiKey = $_GET['key'];

if( checkApiKey($apiKey) ) {
    // 1. open_jtalk
    $cmd = $SYSTEM_DIR . '/talk.sh "' . $text . '" ' . $FileName;
    $success = exec($cmd, $result);

    // 2. ffmpeg
    $cmd = $SYSTEM_DIR . '/ffmpeg_enc.sh ' . $FileName;
    $success = exec($cmd, $result);

    // 3. JSONize
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'];
    $arrRes['audios'] = array(
			      'mp4' => $baseUrl.'/owr/audios/'.$FileName.'.mp4',
			      'ogg' => $baseUrl.'/owr/audios/'.$FileName.'.ogg'
			      );
    $response = json_encode( $arrRes );
}

echo $callbackId . '(' . $response . ')';


function checkApiKey($key) {
    if (!empty($key)) return true;
    return false;
}

?>
