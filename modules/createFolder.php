<?php
echo "-he creado un nuevo archivo";
try{
    $newFolderName = "../root";
    $dirName = "../root/new_folder";

    if(is_dir($dirName) === false){
        mkdir ($dirName);
        echo "hola";
    }

}catch(Throwable $t){
    echo $t->getMessage();
}
//header("Location:../index.php");
