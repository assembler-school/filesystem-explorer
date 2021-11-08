<?php

session_start();

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/joinPath.php");

$errorList = [];
$successList = [];

if (!isset($_POST["filename"])) array_push($errorList, "File name not specified.");
if (!isset($_POST["destpath"])) array_push($errorList, "Destination path not specified.");

if (!count($errorList)) {
	$filename = htmlentities(trim($_POST["filename"]));
	$destpath = htmlentities(trim($_POST["destpath"]));

	if (!validateName($filename)) array_push($errorList, "File name is invalid.");
	if (!validatePath($destpath)) array_push($errorList, "Destination path is invalid.");
}

if (!count($errorList)) {
	try {
		$destpath = joinPath([ROOT_DIRECTORY, $destpath]);
		$fullpath = joinPath([$destpath, $filename . ".txt"]);

		// Checks if file already exists
		if (file_exists($fullpath)) {
			throw new Exception("File already exists.");
		}

		// Checks if destination does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if destination is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		$file = fopen($fullpath, "w");
		fclose($file);

		array_push($successList, "File has been created.");
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);

header("Location: ./index.php");
