<?php
$newFolderName = $_GET['nameFolder'];
 mkdir("../root/$newFolderName", 0700);
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

 $myObj->error = "Se ha producido un error";
 $myJSON = json_encode($myObj);
 echo $myJSON;
?>