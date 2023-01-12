<?php
require_once('./utils.php');
session_start();
define("ROOT", "./root");

$fileName = $_REQUEST['file'];
$fileExtension = Utils::getFileExtension($fileName);

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

$pathToExtract = $_SESSION['absolutePath'];
$file = $_SESSION['absolutePath'] . '/' . $fileName;

if ($fileExtension == 'rar') {
  Utils::formatRar($file, $pathToExtract);
} else {
  Utils::formatZip($file, $pathToExtract);
}

header("Location: index.php?p=$returnPath");