<?php

session_start();
require_once './utils.php';

$path = $_SESSION['absolutePath']; 
$files = glob($path . '/*');

$msg = '';
if (count($files) > 0) {
  foreach ($files as $file) {
    if (is_file($file)) {
      unlink($file);
    } else {
      rmdir($file);
    }
  }
  $msg = 'ok';
} else {
  $msg = 'No files to remove';
} 

echo json_encode($msg);