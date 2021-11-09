<?php

session_start();

# Verify this file is called from POST request
$action = isset($_POST) && isset($_POST['action']) ? $_POST['action'] : null;

require_once('../../config.php');
require_once(ROOT . "modules/session.php");

/**
 * Rename File. We can use rename() method.
 * It takes oldname or olddir & newname or new dir
 * Can be use it to move files between folders
 */
$rootPath = ROOT . "drive";
$location = $_POST['userLocation'];

if ($action) {
  $currentPath = $rootPath . $_POST['currentPath'];
  $newPath = $rootPath . $_POST['newPath'];
  rename($currentPath, $newPath);
}

$url = getSessionValue("path");
header("Location: ../../index.php?path=$url");
exit;
