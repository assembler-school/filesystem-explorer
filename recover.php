<?php
require_once('utils/utils.php');
session_start();

$fileName = $_GET['filename'];

$currentPath = './trash/' . $fileName;
$newPath = $_SESSION['recovers'][$fileName];
$array = explode('/', $newPath);
array_pop($array);
$newPathWithoutFileName = implode('/', $array);

if (file_exists($newPathWithoutFileName))
  Utils::moveFiles($currentPath, $newPath);
else
  Utils::moveFiles($currentPath, './root/' . $fileName);

unset($_SESSION['recovers'][$fileName]);
Utils::saveSession(SESSION);

echo json_encode('ok');