<?php
session_start();

$newFolderName = $_POST["directoryName"];
$directoriesFolder = $_SESSION["currentDirectories"];
$newDirectoryPath = dirname(getcwd()) . "/" . $_SESSION["currentPath"] . "/" . $newFolderName;

// Avoiding duplicated folders
if (file_exists($newDirectoryPath)) {
    echo "File exists";
    makeCopyDirectory($newDirectoryPath . "-copy");
} else {
    mkdir($newDirectoryPath);
}

function makeCopyDirectory($newDirectoryPath)
{
    if (file_exists($newDirectoryPath)) {
        echo "Calling makeCopyDirectory";
        makeCopyDirectory($newDirectoryPath . "-copy");
    } else {
        echo "Making file: " . $newDirectoryPath;

        mkdir($newDirectoryPath);
    }
}

// Redirecting
header("Location:../index.php");
