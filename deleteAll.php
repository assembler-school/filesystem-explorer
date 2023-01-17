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
    foreach ($files as $oldPath) {
      $newPath = Utils::changeFileRoute('./trash/', $oldPath);
      $name = Utils::getNameFile($oldPath);
      $finalName = Utils::chooseName($newPath, $name);
      Utils::moveFiles($oldPath, './trash/' . $finalName);
      $_SESSION['recovers'][$name] = $oldPath;
    }
    $msg['folder'] = 'ok';
  } else {
    $msg['folder'] = 'is-empty';
  }
} else { // TRASH
  if (count($files) > 0) {
    foreach ($files as $file) {
      if (is_dir($file))
        Utils::deleteAll($file);
      else
        unlink($file);

      unset($_SESSION['recovers'][Utils::getNameFile($file)]);
    }
    $msg['trash'] = 'ok';
  } else {
    $msg['trash'] = 'is-empty';
  }
}
Utils::saveSession(SESSION);
echo json_encode($msg);