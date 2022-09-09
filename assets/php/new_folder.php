<?php
newFolder();
function newFolder() {
    $target_dir = $_POST['directoryFolder'];
    $folderName = $_POST['foldername'];
    $target_folder = $target_dir . $folderName;

    if (!file_exists($target_folder)) {
        mkdir($target_folder);
        header('Location: ../../index.php');
    } else {
        echo '<p>Error the folder already exists!</p>';
        echo '<p><a href="../../index.php">Back</a></p>';
    }
}
