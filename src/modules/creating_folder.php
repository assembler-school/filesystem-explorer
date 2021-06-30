<?php
session_start();

createFolder($_POST["folderName"], $_SESSION["currentPath"]);

header("Location:./../../index.php");

function createFolder($folderName, $currentPath)
{
  $newFolderName = $folderName;
  $pathNewFolder = $currentPath;
  $pathNewFolder = $pathNewFolder . "/" . $newFolderName;
  mkdir($pathNewFolder, 0700);
}
