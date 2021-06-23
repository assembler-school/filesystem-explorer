<?php
// session_start();

function getFileStats($pathToFile, $rawName)
{
    // Setting all variables
    $fName = explode(".", $rawName)[0];
    $rawType = explode("/", mime_content_type($pathToFile));
    $fType = end($rawType);
    $fPath = $pathToFile;
    if (filesize($pathToFile) < 1000) {
        $fSize =  filesize($pathToFile) . "KB";
    } else {
        $mbSize = filesize($pathToFile) / 1000;
        // echo $mbSize;
        $fSize = number_format($mbSize, 2) . "MB";
    }
    $fCreation = date("m/d/y", filectime($pathToFile));
    $fModification = date("m/d/y", filemtime($pathToFile));

    $fileArray = array("name" => $fName, "type" => $fType, "path" => $fPath, "size" => $fSize, "creation" => $fCreation, "modification" => $fModification);
    return $fileArray;
}
