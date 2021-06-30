<?php
// Required files
require("./modules/fileIcon.php");

// File's associative array
function getFileStats($pathToFile, $rawName)
{
    $fName = $rawName;
    $fMimeType = mime_content_type($pathToFile);
    $rawType = explode("/", mime_content_type($pathToFile));
    $fType = end($rawType);
    $fIcon = getFileIcon($fType);
    $fPath = $pathToFile;
    $fCreation = date("d/m/y", filectime($pathToFile));
    $fModification = date("d/m/y", filemtime($pathToFile));

    // Calculating size
    if (filesize($pathToFile) < 1000) {
        $fSize =  filesize($pathToFile) . " B";
    } else {
        $kbSize = filesize($pathToFile) * 0.001;
        $fSize = number_format($kbSize, 2) . " KB";
        if ($kbSize > 1000) {
            $mbSize = $kbSize * 0.001;
            $fSize = number_format($mbSize, 2) . " MB";
        }
    }

    $fileArray = array("icon" => $fIcon, "name" => $fName, "rawType" => $fMimeType, "type" => $fType, "path" => $fPath, "size" => $fSize, "creation" => $fCreation, "modification" => $fModification);
    return $fileArray;
}
