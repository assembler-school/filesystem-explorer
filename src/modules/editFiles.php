<?php
session_start();

$oldName = $_POST["oldFileName"];
$parentPath = dirname($_POST["oldPath"]);
$basePath = $_SESSION["basePath"];
$newName = $_POST["fileName"];
$pathToEdit =  $basePath . "/" . $parentPath . "/";

// Rename file
rename($pathToEdit . $oldName, $pathToEdit . $newName);

// Resetting search to default
$_SESSION["isSearching"] = false;
$_SESSION["searchText"] = "";

// Redirecting
header("Location:../index.php");
