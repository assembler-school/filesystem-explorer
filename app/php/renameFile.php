<?php
$file = '/' . $_POST['file'];
$newName = $_POST['newName'];

//!path
$explodePath = explode('/', $file);
$rootPath = '';
for ($i = 1; $i <= count($explodePath) - 1; $i++) {

	if ($explodePath[$i] !== '..') {
		$rootPath = $rootPath .  '/' . $explodePath[$i];
	}
}

//!uri
$uri = $_SERVER['REQUEST_URI'];

if (isset($uri) && $uri !== null) {
	$uri = substr($uri, 1);
	$uri = explode('/', $uri);
	$uri = "$_SERVER[DOCUMENT_ROOT]" . "/" . $uri[0];
} else {
	$uri = null;
}
$oldFilePath = $uri . $rootPath;
$newFilePath = dirname($oldFilePath) . '/' .  $newName;
$oldFileName = str_replace(' ', '', str_replace('/', '\ ', $oldFilePath));
$newFileName = str_replace(' ', '', str_replace('/', '\ ', $newFilePath));



if ($_POST['oldName'] !== $_POST['newName']) {
	rename($oldFileName,  $newFileName);
	echo $response = true;
} else {
	$response = false;
}
