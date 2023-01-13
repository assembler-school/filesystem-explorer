<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = $_POST["filePath"];
$text = $_POST["text"];

$openFile = fopen($file, 'w');
fwrite($openFile, $text);
fclose($openFile);

$redirection = str_replace("../", "", $file);

if()
header("location: ../text-editor.php?pathFile=$redirection");

?>