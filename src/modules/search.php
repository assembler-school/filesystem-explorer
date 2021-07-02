<?php
session_start();

$_SESSION["searchFiles"] = [];

getSearchFiles($_SESSION["currentPath"], $_POST["search"]);
header("Location:./../../index.php");

function getSearchFiles($path, $keySearch)
{
  if (is_dir($path)) {
    $files = array_diff(scandir($path), [".", "..", ".DS_Store"]);
    foreach ($files as $file) {
      getSearchFiles("$path/$file", $keySearch);
    }
    $folderName = basename($path);
    if (str_contains($folderName, $keySearch)) {
      array_push($_SESSION["searchFiles"], array("fileName" => $folderName, "filePath" => $path));
    }
  } else {
    $fileName = basename($path);
    if (str_contains($fileName, $keySearch)) {
      array_push($_SESSION["searchFiles"], array("fileName" => $fileName, "filePath" => $path));
    }
  }
}
