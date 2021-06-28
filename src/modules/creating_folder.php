<?php
session_start();

$newFolderName = $_POST["folderName"];
$pathNewFolder = $_SESSION["currentPath"];
echo $pathNewFolder;
$pathNewFolder = $pathNewFolder . "/" . $newFolderName;
mkdir($pathNewFolder, 0700);

header("Location:./../../index.php");
