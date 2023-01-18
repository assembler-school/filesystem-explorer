<?php
if(!isset($_SESSION)){
    session_start();
}



// $path = $_SESSION["absPath"];

    // if(isset($_POST['btn-edit'])){
    //     $newNameFolder = $_POST["edit"];
    //     $directorio = $_SESSION["altPath"] . '/' . $newNameFolder ;
    //     $rutaAbsoluta = $_SESSION["absPath"] . '/' . $newNameFolder .'/';


    //     if (is_dir($directorio)){
    //         rename($rutaAbsoluta, $newNameFolder);
    //     }
    // }



$absPath = $_SESSION["absPath"];

    if (isset($_POST["btn-edit"])) {
        $newNameFolder = $_POST["edit"];
        $rutaAbsoluta = $_SESSION["absPath"];
        $directorio = $_SESSION["altPath"] ;

        rename($rutaAbsoluta, './root/'.$newNameFolder);
    }



?>