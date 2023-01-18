<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php
if(!isset($_SESSION)){
  session_start();

}


  if (isset($_POST["enviar"])){
    // $root = 'root';
    $nameFolder = $_POST["name-folder"];
    $directorio = $_SESSION["altPath"] . '/' . $nameFolder ;
    $rutaAbsoluta = $_SESSION["absPath"] . '/' . $nameFolder .'/';
    $rutaAlternativa = $rutaAbsoluta . '/' . $nameFolder;
    // $directorio2 = $_SESSION["altPath"] . '/' . $nameFolder;
  
    if(!is_dir($directorio)){
        $crear = mkdir($rutaAbsoluta,0777);
        if($crear){
            echo "Directorio $directorio creado correctamente";
            header('Location: index.php'); 
        }else{
            echo "Ha ocurrido un error al crear el directorio";
        }
    }


}

?>