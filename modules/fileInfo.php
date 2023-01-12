<?php

$filePath = $_GET["path"];

$filename = "../files/" . $filePath;

$file = fopen($filename, "r");

$fileInfo = [
    "size" => 0,
    "creationDate" => "",
    "modificationDate" => "",
    "extension" => ""
];

if ($file == false) {
    echo json_encode ("Error in opening file");
    exit();
}

$fileInfo["size"] = filesize($filename);
$fileInfo["creationDate"] = date("Y/m/d H:i:s", filectime($filename));
$fileInfo["modificationDate"] = date("Y/m/d H:i:s", filemtime($filename));
$fileInfo["extension"] = pathinfo($filename, PATHINFO_EXTENSION);

fclose($file);

echo json_encode($fileInfo);
