<?php

$actualFolder = $_GET["actualFolderName"];

array_map("unlink", glob("$actualFolder/*"));
array_map("rmdir", glob("$actualFolder/*"));

rmdir("$actualFolder");

echo json_encode($actualFolder);

?>