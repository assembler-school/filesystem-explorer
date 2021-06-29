<?php
session_start();
checkPath();
header("Location:./../../index.php");

function checkPath()
{
  // $rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";

  $rootPath = getcwd();
  $rootPath = dirname($rootPath, 2);
  $rootPath = str_replace("\\", "/", $rootPath);
  $rootPath .= "/root";

  if (isset($_GET["updatedPath"])) {
    $_SESSION["currentPath"] = $_GET["updatedPath"];
  } else {
    $_SESSION["currentPath"] = $rootPath;
  }
}
