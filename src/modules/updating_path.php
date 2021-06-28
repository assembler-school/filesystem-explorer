<?php
session_start();
checkPath();
header("Location:./../../index.php");

function checkPath()
{
  $rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
  if (isset($_GET["updatedPath"])) {
    $_SESSION["currentPath"] = $_GET["updatedPath"];
  } else {
    $_SESSION["currentPath"] = $rootPath;
  }
}
