<?php

$search = $_POST['search'];
$root = './root';

function getDirContents($dir, &$results = array())
{
  $files = scandir($dir);

  foreach ($files as $key => $value) {
    $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
    if (!is_dir($path)) {
      $results[] = $path;
    } else if ($value != "." && $value != "..") {
      getDirContents($path, $results);
      $results[] = $path;
    }
  }
  return $results;
}

$matches = [];
$allFiles = getDirContents('./root');

foreach ($allFiles as $file) {
  $array = explode('\\', $file);
  $strCompare = $array[count($array) - 1];
  if (strstr(strtolower($strCompare), strtolower($search))) {
    array_push($matches, $file);
  }
}

echo json_encode($matches);