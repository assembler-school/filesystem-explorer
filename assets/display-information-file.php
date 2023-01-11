<?php

$file = "/login.php";

$creationDate = date("Y-m-d H:i:s", filectime($file));
$lastModification = date("Y-m-d H:i:s", filemtime($file));
$size = filesize($file);
/* 
echo $lastModification;
echo $creationDate; */
echo $size;

?>