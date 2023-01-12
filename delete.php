<?php
session_start();
$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['fileName'];
$path = $absolutePath . '/' . $fileName;

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

$msg = '';
if (!is_dir($path)) {
  if (unlink($path))
    $msg = 'ok';
  else
    $msg = 'Error deleting file';
} else {
  delete_files($path);
  $msg = 'ok';
}

echo json_encode($msg);


?>