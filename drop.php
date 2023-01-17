<?php
require_once('./utils.php');
session_start();
$currentPath = $_SESSION['absolutePath'];

$oldFile = $_REQUEST['old'];
$newFolder = $_REQUEST['new'];


$oldPath = $currentPath . '/' . $oldFile;
$newPath = $currentPath . '/' . $newFolder . '/' . $oldFile;

$finalName = Utils::chooseName($newPath, $oldFile);
$finalPath = $currentPath . '/' . $newFolder . '/' . $finalName;
Utils::moveFiles($oldPath, rtrim($finalPath, '.'));

echo json_encode('ok');