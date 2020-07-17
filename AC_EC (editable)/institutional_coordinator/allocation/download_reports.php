<?php
include_once('../verify.php');
include_once('../../config.php');
$zipPath = $base_dir . $_REQUEST['path'];
// echo $filepath;
// new GoodZipArchive($filepath, $zipPath);
// die(json_encode($_REQUEST));
if (file_exists($zipPath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipPath) . '"');


    header('Pragma: public');
    header('Content-Length: ' . filesize($zipPath));
    ob_clean();
    ob_end_flush();
    readfile($zipPath);
}
// die();
