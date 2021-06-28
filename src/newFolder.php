<?php

function newFolder($currentDir)
{
if (isset($_POST['newFile'])) {
$newFileName = $_POST['newFile'];
$directoryFolders = scandir($currentDir);

if (in_array($newFileName, $directoryFolders)) {
$n = 0;
$adaptedFileName = $newFileName;
while (in_array($adaptedFileName, $directoryFolders)) {
$n++;
$adaptedFileName = $newFileName . "(" . $n . ")";
}
mkdir($currentDir . "/" . $adaptedFileName);
} else {
mkdir($currentDir . "/" . $newFileName);
}

header("Location: index.php");
}
}
