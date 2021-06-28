<?php
deleteFile($_GET["filePath"]);
header("Location:./../../index.php");

function deleteFile($path)
{
  if (is_dir($path)) {
    $files = array_diff(scandir($path), ['.', '..']);
    foreach ($files as $file) {
      deleteFile("$path/$file");
    }
    rmdir($path);
  } else {
    unlink($path);
  }
}
