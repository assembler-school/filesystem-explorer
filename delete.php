<?php

session_start();
require_once('./utils.php');
$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['fileName'];
$path = $absolutePath . '/' . $fileName;

$msg = 'ok';
if (!is_dir($path)) {
  $array = explode('/', $path);
  $newPath = './trash/' . $array[count($array) - 1];
  rename($path, $newPath);
} else {
  Utils::move_files($path);
}

echo json_encode($msg);
?>