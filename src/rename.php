<?php

session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = substr($completePath, strpos($completePath, "root"));

if (isset($_POST['renameInput'])) {
    $newFileName = $_POST['renameInput'];
    $oldFileName = $_POST['oldNameInput'];
    $directory = scandir("../" . $currentPath);
    $file_parts = pathinfo($newFileName);


    if (in_array($newFileName, $directory)) {
        $n = 0;
        $adaptedFileName = $newFileName;
        while (in_array($adaptedFileName, $directory)) {
            $n++;
            $adaptedFileName = $file_parts['filename'] . "(" . $n . ")." . $file_parts['extension'];
        }
        rename("../" . $currentPath . "/" . $oldFileName, "../" . $currentPath . "/" . $adaptedFileName);
    } else {
        rename("../" . $currentPath . "/" . $oldFileName, "../" . $currentPath . "/" . $newFileName);
    }

    header("Location: ../index.php?exit");
}
