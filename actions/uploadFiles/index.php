<?php

session_start();

require_once("../../config.php");
require_once(ROOT . "/modules/validation.php");
require_once(ROOT . "/modules/session.php");
require_once(ROOT . "/utils/joinPath.php");
require_once(ROOT . "/utils/getUploadedFiles.php");
require_once(ROOT . "/utils/getUploadError.php");

$errorList = [];
$successList = [];

if (!isset($_POST["destpath"])) array_push($errorList, "Destination path is not specified.");
if (!isset($_FILES["files"]))		array_push($errorList, "Files to upload have not been specified.");

if (!count($errorList)) {
	$destpath = htmlentities(trim($_POST["destpath"]));

	if (!validatePath($destpath)) array_push($errorList, "Destination path is invalid.");
}

if (!count($errorList)) {
	try {
		$destpath = joinPath([ROOT_DIRECTORY, $_POST["destpath"]]);

		// Checks if parent does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if parent is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		$files = getUploadedFiles($_FILES['files']);

		$errorList = [];
		$successList = [];

		for ($i = 0; $i < count($files); $i++) {
			$file = $files[$i];
			$code = validateUploadedFile($file);

			if ($code > 0) {
				array_push($errorList, getUploadError($file, $code));
			} else {
				$tmpname 	= $file['tmp_name'];
				$filename = $file["name"];
				$fullname = joinPath([$destpath, $filename]);

				move_uploaded_file($tmpname, $fullname);

				array_push($successList, "File $filename has been uploaded succesfully.");
			}
		}
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);

$url = getSessionValue("path");
header("Location: ../../index.php?path=$url");
