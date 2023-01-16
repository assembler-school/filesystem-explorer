<?php

session_start();


if (count($_SESSION['moves']) > 0) {
  foreach ($_SESSION['moves'] as $key => $move) {
    $newPath = $_SESSION['absolutePath'];
    $oldPath = $move;
    $newPath = $newPath . '/' . $key;

    if (file_exists($oldPath) && ((!file_exists($newPath)) || is_writable($newPath))) {
      rename($oldPath, $newPath);
    }
  }
  $_SESSION['moves'] = [];
} else {
  foreach ($_SESSION['copies'] as $key => $copy) {
    $newPath = $_SESSION['absolutePath'];
    $oldPath = $copy;
    $newPath = $newPath . '/' . $key;
    if (
      file_exists($oldPath) &&
      ((!file_exists($newPath)) || is_writable($newPath))
    ) {
      rename($oldPath, $newPath);
    }
  }
  $_SESSION['copies'] = [];

}

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

header("Location: index.php?p=$returnPath&paste");