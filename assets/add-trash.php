<?php

$nombreFile = $_GET['filePath'];

$slash = '/';

$fileToTrash = explode($slash, $nombreFile);


rename($nombreFile, '../root/Trash/'.$fileToTrash[3]);


/* 
rename('../root/Nuevo Nombre/????', '../root/Trash/'.$nombreFile); */

?>