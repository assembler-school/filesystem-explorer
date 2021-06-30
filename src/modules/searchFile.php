<?php
// Required files
require_once("./modules/fileStats.php");

$currPath = $_SESSION["currentPath"];
$_SESSION["searchFiles"] = array();

searchFilesInside($currPath);

// Recursive function to search all files from current path
function searchFilesInside($path_file)
{
    if (is_dir($path_file)) {
        $files = array_diff(scandir($path_file), [".", "..", ".DS_Store"]);
        foreach ($files as $file) {
            searchFilesInside("$path_file/$file");
        }
        $fileName = basename($path_file);
        $fileArray = getFileStats($path_file, $fileName);
        array_push($_SESSION["searchFiles"], $fileArray);
    } else {
        $fileName = basename($path_file);
        $fileArray = getFileStats($path_file, $fileName);
        array_push($_SESSION["searchFiles"], $fileArray);
    }
}
