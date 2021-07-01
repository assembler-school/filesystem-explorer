<?php
session_start();

$rootDir = '/xampp/htdocs/filesystem-explorer/src/UNIT';


if (isset($_REQUEST["valid"])) {
    $currentFolderPath = $_POST["currentFolderPath"];

    echo "<ul class='folder-tree-root'>";
    echo "<li class='folder-tree-folder' data-dir='/xampp/htdocs/filesystem-explorer/src/UNIT'>UNIT</li>";

    buildAsideFolderTree($rootDir);

    echo "</ul>";
}


function buildAsideFolderTree($dir)
{
    if (hasSubDir($dir)) {
        echo "<ul class='folder-tree-group'>";
        foreach (scandir($dir) as $file) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $file) && $file != "." && $file != "..") {
                echo "<li class='folder-tree-folder' data-dir='" . $dir . DIRECTORY_SEPARATOR . $file . "'>" . $file . "</li>";
                buildAsideFolderTree($dir . DIRECTORY_SEPARATOR . $file);
            }
        }
        echo "</ul>";
    }
}

function hasSubDir($dir)
{
    foreach (scandir($dir) as $file) {
        if (is_dir($dir . DIRECTORY_SEPARATOR . $file) && $file != "." && $file != "..") {
            return true;
        }
    }
    return false;
}



// $directory = '/xampp/htdocs/filesystem-explorer/src/UNIT';
// $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

// if (isset($_REQUEST["valid"])) {
//     $currentFolderPath = $_POST["currentFolderPath"];

//     buildAsideFolderTree($iterator);
// }


// function buildAsideFolderTree($i)
// {
//     foreach ($i as $path) {
//         if ($path->getFilename() != "..") {
//             if (is_dir($path)) {
//                 echo "<li class='folder-tree-folder' data-dir='" . str_replace(' ', '%_', $path) . "'>" . dirname($path) . "</li>";
//             }
//         }
//     }
// }
