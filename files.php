<?php

// $fileexample="root/hola.html";

$directoryArray = new ArrayObject(array());

// echo var_dump($directoryArray);

$scan = scandir("root");

unset($scan[0], $scan[1]);

// echo var_dump($scan);

// foreach($scan as $valor){
//     echo var_dump($valor);
//   }


// foreach($scan as $valor){
//   readFileData("root/".$valor);
// }

function readFileData($file){
    $fileObj = (object) [
        'name' => basename($file),
        'size' => filesize($file),
        "modified" => filemtime($file),
        "created" => filectime($file),
      ];
      $directoryArray->append($fileObj);
}

// readFileData($fileexample);
// echo ($directoryArray);
