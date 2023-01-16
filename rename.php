<?php
require_once("./utils.php");
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
  if ($ext)
    $newPath = $_SESSION['absolutePath'] . "/" . $newName . ".$ext";
  else
    $newPath = $_SESSION['absolutePath'] . "/" . $newName;

  $type = 'file';
}

if (!rename($oldPath, $newPath)) {
  $msg['result'] = 0;
}

echo json_encode(['name' => $newName, 'path' => $newPath, 'ext' => $ext, 'type' => $type]);

?>