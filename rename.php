<?php
require_once("utils/utils.php");
session_start();
$newName = $_POST["newName"];
$oldName = $_POST["oldName"];

$oldPath = $_SESSION['absolutePath'] . "/" . $oldName;
$type = '';
$newPath = '';
$ext = '';

if (is_dir($oldPath)) {
  $newPath = $_SESSION['absolutePath'] . "/" . $newName;
  $type = 'dir';
} else {
  $ext = Utils::getFileExtension($oldName);
  if ($ext) {
    $newPath = $_SESSION['absolutePath'] . "/" . $newName . ".$ext";
    $newName = "$newName.$ext";
  } else
    $newPath = $_SESSION['absolutePath'] . "/" . $newName;

  $type = 'file';
}
  $finalName = Utils::chooseName($newPath, $newName);
  $finalPath = $_SESSION['absolutePath'] . "/" . $finalName;
  rename($oldPath, rtrim($finalPath, '.'));
  echo json_encode(rtrim($finalName, '.'));