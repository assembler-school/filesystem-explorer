<?php
session_start();

$newFolderName = $_POST["directoryName"];
$directoriesFolder = $_SESSION["currentDirectories"];
$newDirectoryPath = dirname(getcwd()) . "/" . $_SESSION["currentPath"] . "/" . $newFolderName;

echo $newDirectoryPath;

if (file_exists($newDirectoryPath)) {
    mkdir($newDirectoryPath . "-copy");
} else {
    mkdir($newDirectoryPath);
}

header("Location:../index.php");
