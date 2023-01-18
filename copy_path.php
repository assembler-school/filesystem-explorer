<?php
require_once('utils/utils.php');
session_start();
$action = $_POST['action'];

$root = $_SESSION['absolutePath'];
$name = $_REQUEST['name'];
$path = $root . '/' . $name;

if ($action == 'copy') {
  if (!isset($_SESSION['copies'][$name]))
    $_SESSION['copies'][$name] = $path;
    $size = count($_SESSION['copies']);
} else {
  if (!isset($_SESSION['moves'][$name]))
    $_SESSION['moves'][$name] = $path;
    $size = count($_SESSION['moves']);
}

Utils::saveSession(SESSION);

echo json_encode($size);