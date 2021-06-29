<?php
session_start();

$oldName = $_POST["oldFileName"];
$newName = $_POST["fileName"];
$pathToEdit =  dirname(getcwd()) . "/" . $_SESSION["currentPath"] . "/";

echo "Old name: " . $oldName . "<br>";
echo "New name: " . $newName . "<br>";
echo $pathToEdit . $oldName . "<br>";
echo $pathToEdit . $newName . "<br>";

rename($pathToEdit . $oldName, $pathToEdit . $newName);

header("Location:../index.php");
