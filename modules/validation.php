<?php

require_once(ROOT . "/utils/joinPath.php");

function validateUrlFolderPath()
{
	if (!isset($_GET["path"]) || !$_GET["path"]) return true;

	$urlFolderPath = htmlentities(trim($_GET["path"]));

	if (!validatePath($urlFolderPath)) return false;

	$folderPath =	joinPath([ROOT_DIRECTORY, $urlFolderPath]);

	if (!is_dir($folderPath)) return false;

	return true;
}

function validatePath($path)
{
	if (!preg_match("/^\.?\/?([^\/:*?\"<>|]+\/?)*$/", $path)) 	return false;
	if (preg_match("/\.{2}\//", $path)) 												return false;

	return true;
}

function validateName($name)
{
	if (!preg_match("/^[^\/\\:*?\"<>|]+$/", $name)) return false;

	return true;
}

function validateUploadedFile($file)
{
	$type = $file['type'];
	$code = $file['error'];

	$FILE_TYPES = [
		'application/msword',
		'application/vnd.ms-powerpoint',
		'application/vnd.ms-excel',
		'image/svg+xml',
		'image/jpg',
		'image/jpeg',
		'image/png',
		'text/csv',
		'text/plain',
		'application/vnd.oasis.opendocument.text',
		'application/pdf',
		'application/zip',
		'application/vnd.rar',
		'application/x-msdownload',
		'audio/mpeg',
		'video/mp4',
	];

	if ($code) 													return $code;
	if (!in_array($type, $FILE_TYPES)) 	return 9;

	return 0;
}
