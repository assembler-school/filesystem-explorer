<?php

$nombreFile = $_GET['filePath'];

$slash = '/';

$fileToTrash = explode($slash, $nombreFile); //devuelve array, elementos separados por /


rename($nombreFile, '../root/Trash/'.$fileToTrash[3]);

?>