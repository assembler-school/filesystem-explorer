<?php
session_start();
$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['fileName'];
$path = $absolutePath . '/' . $fileName;

$msg = '';
if (!is_dir($path)) {
  if (unlink($path))
    $msg = 'ok';
  else
    $msg = 'Error deleting file';
} else {
  $files = glob($path . '/*');
  foreach ($files as $file) {
    if (is_dir($file)) {
      rmdir($file);
    } else {
      unlink($file);
    }
  }
  rmdir($path);
  $msg = 'ok';
}

echo json_encode($msg);


?>