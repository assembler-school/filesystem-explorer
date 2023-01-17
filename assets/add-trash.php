<?php

$nombreFile = $_GET['filePath'];

$slash = '/';

$fileToTrash = explode($slash, $nombreFile); //devuelve array, elementos separados por /

$theLastElement = end($fileToTrash);

rename($nombreFile, '../root/Trash/'.$theLastElement);


/* rename($nombreFile, '../root/Trash/'.$fileToTrash[3]); */

?>