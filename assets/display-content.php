<?php

$selectedFolder = $_GET["actualFolderName"];
$resultsFolder = glob("../root/$selectedFolder/*");

echo json_encode($resultsFolder);


if (file_exists($resultsFolder)) {
    echo "$filename was created: " . date("F d Y H:i:s.", filectime($resultsFolder));
}

?>