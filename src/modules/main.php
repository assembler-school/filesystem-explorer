<?php
// function getFiles($dir)
// {
//     $listOfFiles = scandir($dir);

//     unset($listOfFiles[array_search('.', $listOfFiles)]);
//     unset($listOfFiles[array_search('..', $listOfFiles)]);



//     $newArray = array();

//     foreach ($listOfFiles as $file) {
//         $route =  $dir  . $file;
//         // echo $route;
//         $fileSize = filesize($route);
//         $lastModified = date("F d Y H:i:s.", filectime($route));
//         array_push($newArray, array($file, $fileSize, $lastModified));
        
//     }

//     echo json_encode($newArray);
// }

// getFiles("../modules/root/");
