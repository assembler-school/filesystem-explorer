<?php
session_start();
$completePath = $_SESSION['currentPath'];
$currentPath = "../" . substr($completePath, strpos($completePath, "root"));
$file = $currentPath . "/" . $_GET['data'];

if (!is_dir($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
}
