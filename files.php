<?php

$fileexample="root/hola.html";

function readFileData($file){
    $fileObj = (object) [
        'name' => basename($file),
        'size' => filesize($file),
        "modified" => filemtime($file),
        "created" => filectime($file),
      ];
    echo json_encode($fileObj);
}

readFileData($fileexample);