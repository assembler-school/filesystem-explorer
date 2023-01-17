<?php
require_once('./utils.php');
session_start();

if (count($_SESSION['moves']) > 0) {
  foreach ($_SESSION['moves'] as $key => $move) {
    $newPath = $_SESSION['absolutePath'];
    $oldPath = $move;
    $finalPath = $newPath . '/' . $key;
    $finalName = Utils::chooseName($finalPath, $key);
    Utils::moveFiles($oldPath, $newPath . '/' . $finalName);
  }
  $_SESSION['moves'] = [];
} else {
  foreach ($_SESSION['copies'] as $key => $copy) {
    $newPath = $_SESSION['absolutePath'];
    $oldPath = $copy;
    $finalPath = $newPath . '/' . $key;

    if (is_dir($oldPath)) {
      $finalName = Utils::chooseName($finalPath, $key);
      Utils::copyFilesRecursively($oldPath, $newPath . '/' . $finalName);
    } else {
      $finalName = Utils::chooseName($finalPath, $key);
      copy($oldPath, $newPath . '/' . $finalName);
    }
  }
  $_SESSION['copies'] = [];
}
Utils::saveSession(SESSION);

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

header("Location: index.php?p=$returnPath&paste");