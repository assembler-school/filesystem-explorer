<?php
echo "-he creado un nuevo archivo";
try{
    $actualROOT = 
    $newFolderName = "../root";
    $dirName = "../root/"+$actualROOT+"new_folder";
    $dirName2 = "./new_folder";

    if(is_dir($dirName) === false){
        mkdir ($dirName);
        echo "hola";
    }

}catch(Throwable $t){
    echo $t->getMessage();
}



//header("Location:../index.php");
?>
