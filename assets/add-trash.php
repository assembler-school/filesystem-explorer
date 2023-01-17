<?php

$nombreFile = $_GET['filePath'];

$lastSlash = strrpos($nombreFile, "/");
$fileName = substr($nombreFile, $lastSlash); 

rename($nombreFile, '../root/Trash/'.$fileName);

?>