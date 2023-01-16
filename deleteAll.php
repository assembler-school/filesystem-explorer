<?php
session_start();
require_once './utils.php';
$type = $_GET['el'];

if ($type === 'folder') {
  $path = $_SESSION['absolutePath'];
} else {
  $path = './trash';
}

$files = glob($path . '/*');
$msg = [];

if ($type === 'folder') { // FOLDER
  if (count($files) > 0) {
    foreach ($files as $file) {
      if (is_dir($file))
        Utils::move_files($file);
      else {
        $array = explode('/', $file);
        $newPathFile = './trash/' . $array[count($array) - 1];
        rename($file, $newPathFile);
      }
    }
    $msg['folder'] = 'ok';
  } else {
    $msg['folder'] = 'is-empty';
  }

} else { // TRASH
  if (count($files) > 0) {
    foreach ($files as $file) {
      if (is_dir($file))
        Utils::delete_files($file);
      else
        unlink($file);
    }
    $msg['trash'] = 'ok';
  } else {
    $msg['trash'] = 'is-empty';
  }
}

echo json_encode($msg);