<?php
session_start();
$search = $_POST['search'];
$path = $_SESSION['absolutePath'];

$files = array_diff(scandir($path), array('.', '..'));

$matches = [];

foreach ($files as $file) {

  if (strstr(strtolower($file), strtolower($search))) {
    array_push($matches, $file);
  }
}

echo json_encode($matches);

?>