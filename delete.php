<?php

session_start();
$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['fileName'];
$path = $absolutePath . '/' . $fileName;

function createSameDir($dir, $i)
{
  if (!@mkdir($dir . " ($i)")) {
    createSameDir($dir, $i + 1);
  }
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

$msg = 'ok';
if (!is_dir($path)) {
  $array = explode('/', $path);
  $newPath = './trash/' . $array[count($array) - 1];
  rename($path, $newPath);
} else {
  move_files($path);
}

echo json_encode($msg);
?>