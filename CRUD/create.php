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


if (isset($_POST["enviar"])) {
  $nameFolder = $_POST["name-folder"];
  $dir = $_SESSION["altPath"] . '/' . $nameFolder;
  $absRoute = $_SESSION["absPath"] . '/' . $nameFolder . "/";
  $altRoute = $absRoute . '/' . $nameFolder;
  
  var_dump($nameFolder);
  if (!preg_match('/[^a-zA-Z0-9_-]/', $nameFolder)) {
    if (!is_dir($dir)) {
      $create = mkdir($absRoute, 0777);
      if ($create) {
        echo "<script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Folder created!',
            showConfirmButton: false,
            timer: 1500
        })
        </script>";
      } else {
        echo "An error occurred while creating the directory";
      }
    } elseif (is_dir($_SESSION["absPath"])) {
      $create2 = mkdir($altRoute, 0777);
      var_dump($_SESSION["absPath"]);
      if ($create2) {
      } else {
        echo "An error occurred while creating the directory";
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

