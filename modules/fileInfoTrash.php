<?php

$filePath = $_GET["path"];

$filename = "../trash/".$filePath;


// $file = fopen($filename, "r");

$fileInfo = [
    "size" => 0,
    "creationDate" => "",
    "modificationDate" => "",
    "extension" => "",
    "name" => ""
];

// if ($file == false) {
//     echo json_encode ("Error in opening file");
//     exit();
// }

$fileInfo["size"] = filesize($filename);
$fileInfo["creationDate"] = date("Y/m/d H:i:s", filectime($filename));
$fileInfo["modificationDate"] = date("Y/m/d H:i:s", filemtime($filename));
$fileInfo["extension"] = pathinfo($filename, PATHINFO_EXTENSION);
if($fileInfo["extension"] == ""){
    $fileInfo["extension"] = "folder";
}
$fileInfo["name"] = $filename;

// fclose($file);

if(is_dir($filename)){
    $openedFolder = opendir($filename);
    $numberOfFiles = 0;
    
    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {

            // $file = fopen($filename."/".$readFolder, "r");
            // if ($file == false) {
            //     echo json_encode ("Error in opening file");
            //     exit();
            // }

            $fileInfo["size".$numberOfFiles] = filesize($filename."/".$readFolder);
            $fileInfo["modificationDate".$numberOfFiles] = date("Y/m/d H:i:s", filemtime($filename."/".$readFolder));
            $numberOfFiles += 1;
            // fclose($file);
        }
    }
    closedir($openedFolder);
}

echo json_encode($fileInfo);
