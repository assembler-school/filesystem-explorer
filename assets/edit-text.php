<?php

$file = $_POST["filePath"];
$text = $_POST["text"];

$openFile = fopen($file, 'w');
fwrite($openFile, $text);
fclose($openFile);

$redirection = str_replace("../", "", $file);
header("location: ../text-editor.php?filePath=$redirection");

?>