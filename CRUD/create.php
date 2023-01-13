<?php

if (isset($_POST["enviar"])){
  $root = './root';
  $nameFolder = $_POST["name-folder"];
  $directorio = $_SESSION["altPath"] . '/' . $nameFolder;
  $directorio2 = $root . '/' . $nameFolder;

  if(!is_dir($directorio)){
      $crear = mkdir($directorio,0777,true);
      if($crear){
          echo "Directorio $directorio creado correctamente";
      }else{
          echo "Ha ocurrido un error al crear el directorio";
      }
  }
  elseif(!is_dir($directorio2)){
    $crear2 = mkdir($directorio2,0777,true);
      if($crear2){
          echo "Directorio $directorio2 creado correctamente";
      }else{
          echo "Ha ocurrido un error al crear el directorio";
      }
  }
} 

?>