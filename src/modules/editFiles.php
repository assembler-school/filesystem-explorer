<?php
session_start();

$oldName = $_POST["oldFileName"];
$parentPath = dirname($_POST["oldPath"]);
$basePath = $_SESSION["basePath"];
$newName = $_POST["fileName"];

$pathToEdit =  $basePath . "/" . $parentPath . "/";

// $pathToEdit =  dirname(getcwd()) . "/" . $_SESSION["currentPath"] . "/";

// echo "Old name: " . $oldName . "<br>";
// echo "Base path: " . $basePath . "<br>";
// echo "Old path: " . $parentPath . "<br>";
// echo "New name: " . $newName . "<br>";
// echo $pathToEdit . $oldName . "<br>";
// echo $pathToEdit . $newName . "<br>";

rename($pathToEdit . $oldName, $pathToEdit . $newName);


$_SESSION["isSearching"] = false;


// Redirecting
header("Location:../index.php");
