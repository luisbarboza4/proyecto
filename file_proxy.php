<?php 

$file = $_GET['fn'];
if(file_exists($file) && is_readable($file) && !is_dir($file)){
    $mime = mime_content_type($file);
    header("Access-Control-Allow-Origin:*");
    header('Content-type: '.$mime);
    header("Pragma: cache");
    header("Cache-Control: max-age=3600");
    header('Content-length: '.filesize($file));
    $fh = @fopen($file, 'rb');
	if ($fh) {
        fpassthru($fh);
        exit;
	}
} else {
    header("HTTP/1.0 404 Not Found");
}
