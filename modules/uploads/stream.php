<!--this code enables the video to play in the UI-->
<?php
// stream.php?file=video.mp4
if (!isset($_GET['file'])) exit('No file specified');

$filename = basename($_GET['file']); // prevent directory traversal
$filepath = 'C:\\ITD Inhouse folders\\videos\\' . $filename;

if (!file_exists($filepath)) {
    http_response_code(404);
    exit('File not found');
}

$mime = mime_content_type($filepath);
header('Content-Type: ' . $mime);
header('Content-Length: ' . filesize($filepath));
header('Accept-Ranges: bytes');

// optional: allow seeking
$fp = fopen($filepath, 'rb');
while (!feof($fp)) {
    echo fread($fp, 8192);
    flush();
}
fclose($fp);
exit;
?>