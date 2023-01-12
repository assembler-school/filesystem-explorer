<?php


$newFolderName = $_GET['nameFolder'];

mkdir("../filesystem-explorer/root/$newFolderName", 0777);


?>