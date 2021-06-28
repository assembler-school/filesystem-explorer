<?php
session_start();

$newFolderName = $_POST["directoryName"];
$directoriesFolder = $_SESSION["currentDirectories"];

echo "<pre>" . print_r($directoriesFolder, true) . "</pre>";




echo $newFolderName;
