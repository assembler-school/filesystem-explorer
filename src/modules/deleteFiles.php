<?php
// session_start();

$nameToDelete = $_GET["fileName"];
$typeToDelete = $_GET["fileType"];
$pathToDelete =  dirname(getcwd()) . "/root/" . $nameToDelete;

echo "Deleted file: " . $nameToDelete . "<br>";
echo "Deleted type: " . $typeToDelete . "<br>";
echo $pathToDelete;


if (!is_dir($pathToDelete)) {
    unlink($pathToDelete);
    echo "Deleted file";
} else {
    deleteDir($pathToDelete);
}

function deleteDir($path_file)
{
    if (is_dir($path_file)) {
        $files = array_diff(scandir($path_file), [".", ".."]);
        foreach ($files as $file)
            deleteDir("$path_file/$file");
        rmdir($path_file);
    } else {
        unlink($path_file);
    }
}


header("Location:../index.php");
