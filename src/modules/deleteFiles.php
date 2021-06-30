<?php
session_start();

$basePath = $_SESSION["basePath"];
$nameToDelete = $_GET["filePath"];
$typeToDelete = $_GET["fileType"];
$pathToDelete =  $basePath . "/" . $nameToDelete;

// Deleting folders and files
if (!is_dir($pathToDelete)) {
    unlink($pathToDelete);
    echo "Deleted file";
} else {
    deleteDir($pathToDelete);
    echo "Deleted folder";
}

// Recursive function to delete all folders & files inside folder
function deleteDir($path_file)
{
    if (is_dir($path_file)) {
        $files = array_diff(scandir($path_file), [".", ".."]);
        foreach ($files as $file)
            deleteDir("$path_file/$file");
        rmdir($path_file);
    } else {
        unlink($path_file);
    }
}

// Resetting search to default
$_SESSION["isSearching"] = false;
$_SESSION["searchText"] = "";

// Redirecting
header("Location:../index.php");
