<?php

$searchInputValue = $_GET['search'];

$foldersArray = array();
$filesArray = array();
$foldersArrayTrash = array();
$filesArrayTrash = array();



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
function getFindAndFoldersTrash($dir){
foreach(glob($dir."/*") as $ff){

    global $foldersArrayTrash;
    global $filesArrayTrash;
    global $searchInputValue;

    if(is_dir($ff)){
        $explodedff = explode("/", $ff);
        if(str_contains($explodedff[count($explodedff)-1], $searchInputValue)){
            array_push($foldersArrayTrash, $ff);
        }
        getFindAndFolders($ff);
    } else {
        $explodedff = explode("/", $ff);
        if(str_contains($explodedff[count($explodedff)-1], $searchInputValue)){
            array_push($filesArrayTrash, $ff);
        }
    }
}
}

getFindAndFolders("../files");
getFindAndFoldersTrash("../trash");
echo json_encode([
    "ok" => true,
    "folders" => $foldersArray,
    "files" => $filesArray,
    "foldersTrash" => $foldersArrayTrash,
    "filesTrash" => $filesArrayTrash
]);