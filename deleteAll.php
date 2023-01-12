<?php
session_start();
require_once './utils.php';
$path = $_SESSION['absolutePath'];
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
  foreach (glob($path . '/*') as $file) {
    if (is_dir($file))
      delete_files($file);
    else
      unlink($file);
  }
  $msg = 1;
} else {
  $msg = 0;
}

echo json_encode($msg);