<?php
session_start();

// $fileSearch = $_POST["search"];

$_SESSION["searchFiles"] = [];

getSearchFiles($_SESSION["currentPath"], $_POST["search"]);
// print_r($_SESSION["searchFiles"]);
foreach ($_SESSION["searchFiles"] as $file) {
  echo $file[0];
  echo "<br/>";
  echo $file[1];
  echo "<br/>";
}





function getSearchFiles($path, $keySearch)
{
  if (is_dir($path)) {
    $files = array_diff(scandir($path), [".", "..", ".DS_Store"]);
    foreach ($files as $file) {
      getSearchFiles("$path/$file", $keySearch);
    }
  } else {
    $fileName = basename($path);
    if (str_contains($fileName, $keySearch)) {
      array_push($_SESSION["searchFiles"], array($fileName, $path));
    }
  }
}
