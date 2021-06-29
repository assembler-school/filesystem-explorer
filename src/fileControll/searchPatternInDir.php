<?php
session_start();

$directory = '/xampp/htdocs/filesystem-explorer/src/UNIT';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

if (isset($_REQUEST["valid"])) {
    $path = $_POST["path"];
    $pattern = $_POST["pattern"];

    // echo "Search pattern is  $pattern. Search results: " . implode(" , ", glob("../UNIT/*$pattern*")) . " .";
    iterateDirectorySearch($iterator, $pattern);
}


function iterateDirectorySearch($i, $pattern)
{
    $hits = array();
    foreach ($i as $path) {
        if ($path->getFilename() != "..") {
            if (is_dir($path)) {
                foreach (glob(dirname($path) . "/*$pattern*") as $hit) {
                    array_push($hits, $hit);
                    echo "<li>$hit</li>";
                }
            }
        }
        // echo array_key_last($allPaths);
    }
    // print_r($hits);
}





// function iterateDirectorySearch($i)
// {
//     $allPaths = array();

//     foreach ($i as $path) {
//         if ($path->getFilename() != "..") {
//             if (is_dir($path)) {
//                 array_push($allPaths, dirname($path));
//             } else {
//                 array_push($allPaths, pathinfo($path)["dirname"] . "\\" . pathinfo($path)["basename"]);
//             }
//         }
//         // echo array_key_last($allPaths);
//     }
//     // print_r($allPaths);
// }
// $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

// iterateDirectorySearch($iterator);
