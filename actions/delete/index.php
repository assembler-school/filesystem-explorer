<?php

require_once("../../config.php");
require_once(ROOT . "/modules/validation.php");
require_once(ROOT . "/modules/session.php");
require_once(ROOT . "/utils/joinPath.php");
require_once(ROOT . "/utils/deleteNode.php");

$errorList = [];
$successList = [];

try {
	// Checks if param 'path' exists.
	if (!isset($_POST["path"])) throw new Exception("Resource path not specified.");

	$path = htmlentities(trim($_POST["path"]));

	// Checks if param 'path' is valid.
	if (!validatePath($path)) throw new Exception("Resource path is invalid.");

	$fullpath = joinPath([ROOT_DIRECTORY, $path]);

	// Checks if the resource already exists.
	if (!file_exists($fullpath)) throw new Exception("The resource doesn't exist.");

	deleteNode($path);

	array_push($successList, "The resource has been deleted");
} catch (Throwable $e) {
	array_push($successList, $e->getMessage());
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);

header("Location: ../../index.php");
