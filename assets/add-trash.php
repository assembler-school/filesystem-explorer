<?php

$fileToMove = $_GET['filePath'];

$from = $_GET['name-folder'];

$to = $_GET['name-folder="Trash"'];


move_uploaded_file($from, $to);

?>