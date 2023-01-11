<?php

$file = "/login.php";

$creationDate = date("Y-m-d H:i:s", filectime($file));
$lastModification = date("Y-m-d H:i:s", filemtime($file));
$size = filesize($file);

$information = array("creation" => $creationDate, "modify"=> $lastModification, "size"=> $size);

echo json_encode($information);


?>