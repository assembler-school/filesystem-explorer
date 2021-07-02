<?php
session_start();
require("./path_manager.php");
checkPath();
header("Location:./../../index.php");

function checkPath()
{
  // $rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";

  $rootPath = getRoothPathFrModules();


  if (isset($_GET["updatedPath"])) {
    $_SESSION["currentPath"] = $_GET["updatedPath"];
  } else {
    $_SESSION["currentPath"] = $rootPath;
  }
}
