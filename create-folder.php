<?php

$newFolderName = $_GET['nameFolder'];

$folder = json_encode($newFolderName);

echo $folder;

mkdir("./root/$newFolderName", 0777);

?>