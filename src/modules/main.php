<?php
function getFiles($dir)
{
    $listOfFiles = scandir($dir);

    unset($listOfFiles[array_search('.', $listOfFiles)]);
    unset($listOfFiles[array_search('..', $listOfFiles)]);


    // echo json_encode($listOfFiles);

    $newArray = array();

    foreach ($listOfFiles as $file) {
        $route =  $dir  . $file;
        $fileSize = filesize($route);
        $lastModified = date("F d Y H:i:s.", filectime($route));
        array_push($newArray, array($file, $fileSize, $lastModified));
    }

    echo json_encode($newArray);
}

getFiles("../root/");
