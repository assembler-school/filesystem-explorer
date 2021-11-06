<?php
include "./utils/getFilePath.php";

$file = '/' . $_POST['file'];
$newName = $_POST['newName'];
$fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$oldFilePath = getFilePath($file);
$newFilePath = dirname($oldFilePath) . '/' .  $newName . '.' . $fileType;
$oldFileName = str_replace(' ', '', str_replace('/', '\ ', $oldFilePath));
$newFileName = str_replace(' ', '', str_replace('/', '\ ', $newFilePath));



if ($_POST['oldName'] !== $_POST['newName']) {
	rename($oldFileName,  $newFileName);
	echo $response = true;
} else {
	$response = false;
}
