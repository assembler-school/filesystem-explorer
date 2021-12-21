<?php
$root = $_GET["root"];
$fileName = $_GET["fileName"];
$inputNewName= $_POST["inputNewName"];
$oldName = ".".$root."/".$fileName;
$extension = pathinfo($oldName, PATHINFO_EXTENSION);
echo $extension;
$newName = ".".$root."/".$inputNewName.".".$extension;
rename($oldName,$newName);

header("Location:../index.php?root=$root&fileName=$newName");

