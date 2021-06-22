<?php
// Path to base directory
$rootPath = "./root";

// List all files
foreach (scandir($rootPath) as $i) {
    echo $i, "<br>";
};
