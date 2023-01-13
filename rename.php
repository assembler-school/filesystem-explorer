<?php
require_once("./utils.php");
session_start();
$newName = $_POST["newName"];
$oldName = $_POST["oldName"];

$oldPath = $_SESSION['absolutePath'] . "/" . $oldName;
$msg = ['result' => 1];
$newPath = '';
$extension = Utils::getFileExtension($oldName);

if (is_dir($oldPath)) {
  $newPath = $_SESSION['absolutePath'] . "/" . $newName;
  $msg['type'] = 'dir';
} else {
  $newPath = $_SESSION['absolutePath'] . "/" . $newName . ".$extension";
  $msg['type'] = 'file';
}


if (!rename($oldPath, $newPath)) {
  $msg['result'] = 0; 
}

echo json_encode($msg);

?>