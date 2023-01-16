<?php

$fileToMove  = $_GET['filepath']; //atrubito de boton "restore" en popUp, pasamos por fetch

$nomeFolder = $_GET['folderName']; //value of prompt

$slash = '/';
$fileName = explode($slash, $fileToMove); 

rename($fileToMove, '../root/'.$nomeFolder.'/'.$fileName[3]);

?>