<?php
session_start();

$basePath = $_SESSION["basePath"];
$nameToDelete = $_GET["filePath"];
$typeToDelete = $_GET["fileType"];
$pathToDelete =  $basePath . "/" . $nameToDelete;

echo "Deleted file: " . $nameToDelete . "<br>";
echo "Deleted type: " . $typeToDelete . "<br>";
echo "Path to delete " . $pathToDelete . "<br>";


if (!is_dir($pathToDelete)) {
    unlink($pathToDelete);
    echo "Deleted file";
} else {
    deleteDir($pathToDelete);
    echo "Deleted folder";
}

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


$_SESSION["isSearching"] = false;

// Redirecting
header("Location:../index.php");
