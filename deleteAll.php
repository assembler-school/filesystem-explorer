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
$msg = '';

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


if (count($files) > 0) {
  foreach ($files as $file) {
    if (is_dir($file))
      delete_files($file);
    else
      unlink($file);
  }
  if ($path === './trash') $msg = 2;
  else $msg = 1;
} else {
  $msg = 0;
}

echo json_encode($msg);