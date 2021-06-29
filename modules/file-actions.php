<?php

function getAllFiles($dir, &$results = array())
{
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = ['path' => realpath($path), 'name' => $value, 'size' => filesize($path), "modified" => date("m/d/Y H:i", filemtime($path)), "created" => date("m/d/Y H:i", filectime($path)),];
        } else if ($value != "." && $value != "..") {
            getAllFiles($path, $results);
            $results[] = ['name' => $value, "modified" => date("m/d/Y H:i", filemtime($path)), "created" => date("m/d/Y H:i", filectime($path))];
        }
    }
    return $results;
}

$filesList = getAllFiles("../root");
$fileToDelete = $_POST["delete"];
// print_r($filesList);
foreach ($filesList as $file) {
    // echo $file["name"];
    if (isset($fileToDelete)) {
        if ($file["name"] === $fileToDelete) {
            unlink($file["path"]);
            header("Location: ../index.php?deleted=true");
        }
    } elseif (isset($_POST["rename"]) && isset($_POST["newName"])) {
        $fileName = explode(".", $file["name"])[0];
        $rpName = str_replace($fileName, $_POST["newName"], $file["path"]);
        if ($fileName === $_POST["rename"]) {
            rename($file["path"], $rpName);
            header("Location: ../index.php?renamed=true");
        }
    }
}
