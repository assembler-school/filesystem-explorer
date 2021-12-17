<?php

echo "-he creado un nuevo archivo";
try{
    $newFileName = "../root/NewFile.txt";
    $fileContent = "Hola soy el contenido";

    $file= fopen($newFileName,"w");

    fwrite($file,$fileContent);

    fclose($file);

}catch(Throwable $t){
    echo $t->getMessage();
}
header("Location:../index.php");