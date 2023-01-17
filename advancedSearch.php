<?php
require_once('./utils.php');
$search = $_POST['search'];
$root = './root';

$matches = [];
$allFiles = Utils::getDirContents('./root');

foreach ($allFiles as $file) {
  $array = explode('\\', $file);
  $strCompare = $array[count($array) - 1];
  if (strstr(strtolower($strCompare), strtolower($search))) {
    array_push($matches, $file);
  }
}

echo json_encode($matches);