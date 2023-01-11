<?php
session_start();
$path = $_SESSION['absolutePath'];
$files = glob($path . '/*');

if ($files) {
  foreach ($files as $file) {
    if (is_file($file)) {
      unlink($file);
    } else {
      rmdir($file);
    }
  }
}

echo json_encode('ok');