<?php

if (!isset($_SESSION)) {
  session_start();
}



if(isset($_SESSION) && isset($_REQUEST["route"])) {
  $completeRoot = $_REQUEST["route"];
  // var_dump($completeRoot);
}

if (isset($_POST["enviar"])){
  // $root = './root';
  $nameFolder = $_POST["name-folder"];
  $directorio = $completeRoot . '/' . $nameFolder;
  


  if(!is_dir($directorio)){
      $crear = mkdir($directorio,0777,true);
      if($crear){
          echo "Directorio $directorio creado correctamente";
      }else{
          echo "Ha ocurrido un error al crear el directorio";
      }
  }
}



// if (isset($_POST["enviar"])) {
//   $root = './root';
//   $nameFolder = $_POST["name-folder"];
//   $directorio = $root . "/" . $nameFolder;
//   if (!is_dir($directorio)) {
//     $crear = mkdir($directorio);
//     if ($crear) {
//       echo "Directorio $directorio creado correctamente";
//     } elseif (is_dir($directorio)) {
//       echo "Ha ocurrido un error al crear el directorio";
//     }
//   }
// }

// elseif (isset($_POST["enviar"])) {

//   // $root = './root';
//   $nameFolder = $_POST["name-folder"];
//   // $directorio = $root."/".$nameFolder;
//   $rutaAlternativa = $_SESSION["altPath"] . "/" . $nameFolder;
//   if (!is_dir($rutaAlternativa)) {
//     if (is_dir($_SESSION["altPath"])) {
//       $crear2 = mkdir($rutaAlternativa, 0777, true);
//       if ($crear2) {
//         echo "Directorio $rutaAlternativa creado correctamente";
//       } else {
//         echo "Ha ocurrido un error al crear el directorio";
//       }
//     } else {
//       echo "La ruta base no existe";
//     }
//   }
// }


?>