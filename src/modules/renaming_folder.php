<?php
$expFolderPath = explode("/", $_POST["folderPath"]);
$baseFolderPath = "";
for ($i = 0; $i < count($expFolderPath) - 1; $i++) {
  $baseFolderPath .=  $expFolderPath[$i] . "/";
}

rename($_POST["folderPath"], ($baseFolderPath . $_POST["newFolderName"]));

header("Location:./../../index.php");
