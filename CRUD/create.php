<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php

if (!isset($_SESSION)) {
  session_start();
}





if (isset($_POST["enviar"])) {
  $nameFolder = $_POST["name-folder"];
  $directorio = $_SESSION["altPath"] . '/' . $nameFolder;
  $absRoute = $_SESSION["absPath"] . '/' . $nameFolder . "/";
  $altRoute = $absRoute . '/' . $nameFolder;
  
  var_dump($nameFolder);
  if (!preg_match('/[^a-zA-Z0-9_-]/', $nameFolder)) {
    if (!is_dir($directorio)) {
      $crear = mkdir($absRoute, 0777);
      if ($crear) {
        echo "<script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Folder created!',
            showConfirmButton: false,
            timer: 1500
        })
        </script>";
        // echo "Directorio $rootPath creado correctamente";
      } else {
        echo "Ha ocurrido un error al crear el directorio";
      }
    } elseif (is_dir($_SESSION["absPath"])) {
      $crear2 = mkdir($altRoute, 0777);
      var_dump($_SESSION["absPath"]);
      if ($crear2) {
        // echo "Directorio $rootPath creado correctamente";
      } else {
        echo "Ha ocurrido un error al crear el directorio";
      }
    }

  } else {
    echo "<script>
    function triggerAlertModal() {
      Swal.fire({
        icon: 'error',
        title: 'Only letters, numbers and hyphens are allowed!',
        timer: 4000,
        showConfirmButton: false,
        timerProgressBar: true,
      })
    }
    triggerAlertModal()
      </script>";
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