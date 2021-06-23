<?php

function getFileStats($pathToFile, $fName)
{
    // Setting all variables
    $fType = filetype($pathToFile);
    $fPath = $pathToFile;
    if (filesize($pathToFile) < 1000) {
        $fSize =  filesize($pathToFile) . "KB";
    } else {
        $mbSize = filesize($pathToFile) / 1000;
        // echo $mbSize;
        $fSize = number_format($mbSize, 2) . "MB";
    }
    $fCreation = filectime($pathToFile);
    $fModification = filemtime($pathToFile);


    $fileArray = array("name" => $fName, "type" => $fType, "path" => $fPath, "size" => $fSize, "creation" => $fCreation, "modification" => $fModification);
    return $fileArray;
}
