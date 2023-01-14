<?php
session_start();
require_once './utils.php';
$type = $_GET['el'];

if ($type === 'folder') {
  $path = $_SESSION['absolutePath'];
} else {
  $path = './trash';
}

$files = glob($path . '/*');
$msg = [];

function createSameDir($dir, $i)
{
  if (!@mkdir($dir . " ($i)")) {
    createSameDir($dir, $i + 1);
  }
}

function delete_files($dir)
{
  foreach (glob($dir . '/*') as $file) {
    if (is_dir($file))
      delete_files($file);
    else
      unlink($file);
  }
  rmdir($dir);
}
function move_files($dir)
{
  $finalDir = str_replace('./root/', '', $dir);
  $pathDir = './trash/' . $finalDir;
  if (!@mkdir($pathDir)) {
    createSameDir($pathDir, 2);
  }
  foreach (glob($dir . '/*') as $file) {
    if (is_dir($file))
      move_files($file);
    else {
      $array = explode('/', $file);
      $newPathFile = $pathDir . '/' . $array[count($array) - 1];
      rename($file, $newPathFile);
    }
  }
  rmdir($dir);
}

if ($type === 'folder') { // FOLDER
  if (count($files) > 0) {
    foreach ($files as $file) {
      if (is_dir($file))
        move_files($file);
      else {
        $array = explode('/', $file);
        $newPathFile = './trash/' . $array[count($array) - 1];
        rename($file, $newPathFile);
      }
    }
    $msg['folder'] = 'ok';
  } else {
    $msg['folder'] = 'is-empty';
  }

} else { // TRASH
  if (count($files) > 0) {
    foreach ($files as $file) {
      if (is_dir($file))
        delete_files($file);
      else
        unlink($file);
    }
    $msg['trash'] = 'ok';
  } else {
    $msg['trash'] = 'is-empty';
  }
}

echo json_encode($msg);