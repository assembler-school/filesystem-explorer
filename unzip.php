<?php
require_once('utils/utils.php');
require_once('./js/alert.js');
session_start();
define("ROOT", "./root");

$fileName = $_REQUEST['file'];
$fileExtension = Utils::getFileExtension($fileName);

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

$pathToExtract = $_SESSION['absolutePath'];
$file = $_SESSION['absolutePath'] . '/' . $fileName;
$extracted;
if ($fileExtension == 'rar') {
  $extracted = Utils::formatRar($file, $pathToExtract, $fileName);
} else {
  $extracted = Utils::formatZip($file, $pathToExtract, $fileName);
}

header("Location: index.php?p=$returnPath&rar=$extracted");