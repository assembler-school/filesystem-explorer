<?php
if(isset($_POST)){
    $namefolder= $_POST["folderName"];
    createNewFolder();
}


function createNewFolder(){
    global $namefolder;
    if (!file_exists("../root/$namefolder")) {
        mkdir("../root/$namefolder", 0777, true);
        header("location: ../index.php");
    }else{
        header("location: ../index.php?error");
    }
}

if(isset($_POST["prueba"])){
    $namefile= $_POST["prueba"];
    fopean();
}
function fopean(){
    global $namefile;

    try{
        $newFileName = "../root/$namefile";
        // print $newFileName;
        $content="";
        $file= fopen($newFileName, "w+");
        fwrite($file, $content);

    }catch(Throwable $t){
        echo $t -> getMessage();
    }
    
}
?>