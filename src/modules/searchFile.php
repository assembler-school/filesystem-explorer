<?php


require_once("./modules/fileStats.php");

$currPath = $_SESSION["currentPath"];

$_SESSION["searchFiles"] = array();
searchFilesInside($currPath);



function searchFilesInside($path_file)
{
    if (is_dir($path_file)) {
        $files = array_diff(scandir($path_file), [".", "..", ".DS_Store"]);
        foreach ($files as $file) {

            searchFilesInside("$path_file/$file");
        }
        $pathArray = explode("/", $path_file);
        $fileName = end($pathArray);
        $fileArray = getFileStats($path_file, $fileName);
        array_push($_SESSION["searchFiles"], $fileArray);
    } else {
        $pathArray = explode("/", $path_file);
        $fileName = end($pathArray);
        $fileArray = getFileStats($path_file, $fileName);
        array_push($_SESSION["searchFiles"], $fileArray);
    }
}
// echo "<pre>" . print_r($_SESSION["searchFiles"], true) . "</pre>";


// print_r(array_filter($_SESSION["searchFiles"]), function($png)){
//    
//     
// });

$matchedFiles = array_filter($_SESSION["searchFiles"], "getMatchedFile");
// echo "<pre>";
// echo print_r($matchedFiles);
// echo "</pre>";



// function getMatchedFile()
// {
//     foreach ($_SESSION["searchFiles"] as $file) {
//         // echo print_r($file) . "<br/>";
//     }
// }

// getMatchedFile();
