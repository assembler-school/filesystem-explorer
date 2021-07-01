<?php
session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = substr($completePath, strpos($completePath, "root"));

echo $completePath;
echo $currentPath;

if (isset($_POST['newFile'])) {
    $newFileName = $_POST['newFile'];
    $directoryFolders = scandir("../$currentPath");

    if (in_array($newFileName, $directoryFolders)) {
        $n = 0;
        $adaptedFileName = $newFileName;
        while (in_array($adaptedFileName, $directoryFolders)) {
            $n++;
            $adaptedFileName = $newFileName . "(" . $n . ")";
        }
        mkdir("../" . $currentPath . "/" . $adaptedFileName);
    } else {
        mkdir("../" . $currentPath . "/" . $newFileName);
    }

    header("Location: ../index.php");
}
