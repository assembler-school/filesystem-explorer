<?php

session_start();
require_once('./utils.php');
$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['fileName'];
$oldPath = $absolutePath . '/' . $fileName;
$newPath = './trash/' . $fileName;
$finalName = Utils::chooseName($newPath, $fileName);
Utils::moveFiles($oldPath, './trash/' . $finalName);

echo json_encode('ok');
?>