<?php
session_start();
checkPath();
header("Location:./index.php");

function checkPath()
{
  $rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
  if (isset($_GET["updatedPath"])) {
    echo "Tengo url";
    $_SESSION["currentPath"] = $_GET["updatedPath"];
    echo $_SESSION["currentPath"];
  } else {
    echo "No tengo url";
    $_SESSION["currentPath"] = $rootPath;
  }
}
