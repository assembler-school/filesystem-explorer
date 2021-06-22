<?php
// Change current directory to root
$homeDir = "./root";
chdir($homeDir);
echo "<br>" . getcwd() . "<br>";

$currentDirectory = getcwd();
// $currentDirectory = "";
// $scannedDirectory = array_diff(scandir($homeDir . $currentDirectory), array('..', '.'));
$scannedDirectory = array_diff(scandir("./"), array('..', '.'));
// var_dump($scannedDirectory);

function isFile($file)
{
    return filetype($file) == "file";
}

function isDir($file)
{
    return filetype($file) == "dir";
}

$foldersArray = array_filter($scannedDirectory, "isDir");
$filesArray = array_filter($scannedDirectory, "isFile");


function explodeFileName($fileName)
{
    return explode(".", $fileName);
}

function human_filesize($bytes, $decimals = 2)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}


foreach ($foldersArray as $folder) {
    echo "Folder: " . $folder . "<br>";
    echo " was last modified: " . date("F d Y H:i:s.", filemtime($folder)) . "<br>";
    echo " was created: " . date("F d Y H:i:s.", filectime($folder)) . "<br>"; // Doesn't work on Unix
}

foreach ($filesArray as $file) {
    echo "File name: " . $file;
    echo " was last modified: " . date("F d Y H:i:s.", filemtime($file)) . "<br>";
    echo " was created: " . date("F d Y H:i:s.", filectime($file)) . "<br>"; // Doesn't work on Unix
    echo  " size:" . human_filesize(filesize($file)) . "<br>";
}

// $directoryArray = array_map("explodeFileName", $scannedDirectory);

// echo "<br> ";
// var_dump($directoryArray);
