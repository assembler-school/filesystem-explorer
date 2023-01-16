<?php
require_once("./utils.php");
session_start();
$newName = $_POST["newName"];
$oldName = $_POST["oldName"];

$oldPath = $_SESSION['absolutePath'] . "/" . $oldName;
$type = '';
$newPath = '';
$ext = '';

function file_newname($path, $filename)
{
  if ($pos = strrpos($filename, '.')) {
    $name = substr($filename, 0, $pos);
    $ext = substr($filename, $pos);
  } else {
    $name = $filename;
  }
  $newpath = $path . '/' . $filename;
  $newname = $filename;

  if (file_exists($newpath)) {
    $counter = 1;
    if ($pos = strrpos($name, '_')) {
      $oldcounter = substr($name, $pos + 1);
      if (is_numeric($oldcounter)) {
        $counter = $oldcounter + 1;
        $name = substr($name, 0, $pos);
      }
    }
    $newname = $name . '_' . $counter . $ext;
    $newpath = $path . '/' . $newname;

    while (file_exists($newpath)) {
      $newname = $name . '_' . $counter . $ext;
      $newpath = $path . '/' . $newname;
      $counter++;
    }
  }
  return $newname;
}

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

rename($oldPath, $newPath);


echo json_encode(['name' => $newName, 'path' => $newPath, 'ext' => $ext, 'type' => $type]);




?>