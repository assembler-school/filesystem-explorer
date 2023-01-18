<?php

$selectedFolder = $_GET["actualFolderName"];
$resultsFolder = glob("../root/$selectedFolder/*");

echo json_encode($resultsFolder);

?>