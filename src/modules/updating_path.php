<?php
session_start();
checkPath();
header("Location:./../../index.php");

function checkPath()
{
  $rootPath = "./root";
  if (isset($_GET["updatedPath"])) {
    $_SESSION["currentPath"] = $_GET["updatedPath"];
  } else {
    $_SESSION["currentPath"] = $rootPath;
  }
}
