<?php
require_once('./utils.php');
session_start();

$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['nameCreated'];
$path = $absolutePath . "/" . $fileName;
$type = $_POST['select'];

if ($type == ".txt") {
  $finalName = Utils::chooseName($path . $type, $fileName . $type);
  $finalPath = $absolutePath . '/' . $finalName;
  echo $finalPath;
  file_put_contents(rtrim($finalPath, '.'), "");
} else {
  $finalName = Utils::chooseName($path, $fileName);
  $finalPath = $absolutePath . '/' . $finalName;
  echo $finalPath;
  mkdir(rtrim($finalPath, '.'));
}

if (isset($_SESSION['relativePath']))
  $returnPath = $_SESSION['relativePath'];


header("Location: index.php?p=$returnPath");
?>