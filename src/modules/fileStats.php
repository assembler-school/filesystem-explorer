<?php
require("./modules/fileIcon.php");

function getFileStats($pathToFile, $rawName)
{
    // Setting all variables
    // $fName = explode(".", $rawName)[0];
    // $fName = str_replace(" ", "&#160;", $rawName);

    $fName = $rawName;
    $fMimeType = mime_content_type($pathToFile);
    $rawType = explode("/", mime_content_type($pathToFile));
    $fType = end($rawType);
    $fIcon = getFileIcon($fType);
    $fPath = $pathToFile;

    if (filesize($pathToFile) < 1000) {
        $fSize =  filesize($pathToFile) . " B";
    } else {
        $kbSize = filesize($pathToFile) * 0.001;
        // echo $mbSize;
        $fSize = number_format($kbSize, 2) . " KB";
        if ($kbSize > 1000) {
            $mbSize = $kbSize * 0.001;
            // echo $mbSize;
            $fSize = number_format($mbSize, 2) . " MB";
        }
    }

    $fCreation = date("m/d/y", filectime($pathToFile));
    $fModification = date("m/d/y", filemtime($pathToFile));

    $fileArray = array("icon" => $fIcon, "name" => $fName, "rawType" => $fMimeType, "type" => $fType, "path" => $fPath, "size" => $fSize, "creation" => $fCreation, "modification" => $fModification);
    return $fileArray;
}
