<?php
$local_dir = "root/";
$allFiles = scandir($local_dir);
$allFiles = array_diff($allFiles, array(".", "..", ".DS_Store"));
$allFiles = array_values($allFiles);

$searchValue = $_POST["search"];

foreach ($allFiles as $searchedFile) {
    if (strpbrk($searchedFile, $searchValue)) {
        print_r($searchedFile);
    }
}
