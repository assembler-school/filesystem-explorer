<?php



// delete 

session_start();


$pathToDelete = $_GET["delete"];

$path_file =  dirname(getcwd()) . "/root/" . $pathToDelete;


// unlink($path_file);
// rmdir($path_file);

header("Location:../index.php");



// function deleteDir($path_file)
// {
//     if (is_dir($path_file)) {
//         $files = array_diff(scandir($path_file), [".", ".."]);
//         foreach ($files as $file)
//             deleteDir("$path_file/$file");
//         rmdir($path_file);
//     } else {
//         unlink($path_file);
//     }
// }





// $pathToDelete = dirname(__FILE__) . "/" . $fileName;

// $fileName = $_GET["delete"];

// unlink($pathToDelete);
























// $rootPath = "./root";

// function deleteFile($pathToDelete)
// {
//     if (is_link($pathToDelete)) {
//         return unlink($pathToDelete);
//     } elseif (is_dir($pathToDelete)) {
//         $objets = scandir($pathToDelete);
//         $ok = true;
//         if (is_array($objets)) {
//             foreach ($objets as $j) {
//                 if ($j != "." && $j != "..") {
//                     if (!deleteFile($pathToDelete . "/" . $j)) {
//                         $ok = false;
//                     }
//                 }
//             }
//         }
//         return ($ok) ? rmdir($pathToDelete) : false;
//     } elseif (is_file($pathToDelete)) {
//         return unlink($pathToDelete);
//     }

//     return false;
// }



// function deleteDir($pathToDelete)
// {
//     if (is_dir($pathToDelete)) {
//         $objects = scandir($pathToDelete);
//         foreach ($objects as $i) {
//             if ($i != "." && $i != "..") {
//                 if (filetype($pathToDelete . "/" . $i) == "name") deleteDir($pathToDelete . "/" . $i);
//                 else unlink($pathToDelete . "/" . $i);
//             }
//         }
//         reset($objects);
//         rmdir($pathToDelete);
//     }
// }
