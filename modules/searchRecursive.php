<?php

$searchInputValue = $_GET['search'];

$foldersArray = array();
$filesArray = array();



function getFindAndFolders($dir){
foreach(glob($dir."/*") as $ff){

    global $foldersArray;
    global $filesArray;
    global $searchInputValue;

    if(is_dir($ff)){
        $explodedff = explode("/", $ff);
        if(str_contains($explodedff[count($explodedff)-1], $searchInputValue)){
            array_push($foldersArray, $ff);
        }
        getFindAndFolders($ff);
    } else {
        $explodedff = explode("/", $ff);
        if(str_contains($explodedff[count($explodedff)-1], $searchInputValue)){
            array_push($filesArray, $ff);
        }
    }
}
}

getFindAndFolders("../files");
echo json_encode([
    "ok" => true,
    "folders" => $foldersArray,
    "files" => $filesArray
]);