<?php

$root = $_GET["root"];

$fileNameS = $_POST["fileName"];

createFileFun($root, $fileNameS);

function createFileFun($root, $fileNameS){

    echo "-he creado un nuevo archivo";
    try{

        $newFileName = ".".$root."/".$fileNameS;
        echo $newFileName;
        $fileContent = "Hola soy el contenido";

        $file= fopen($newFileName,"w");

        fwrite($file,$fileContent);

        fclose($file);

    }catch(Throwable $t){
        echo $t->getMessage();
    }
    header("Location:../index.php?root=$root");
}
