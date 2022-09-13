<?php
newFolder();
function newFolder() {
    $target_dir = $_POST['directoryFolder'];
    $folderName = $_POST['foldername'];
    $name1 = "root";
    $name2 = "index";
    $name3 = "readme";
    $folderName = strtolower($folderName);
    $target_folder = $target_dir . $folderName;

    if (!file_exists($target_folder)) {
        if ($target_folder !== $target_dir . $name1 && $target_folder !== $target_dir . $name2 && $target_folder !== $target_dir . $name3 && $target_folder !== $target_folder) {
            mkdir($target_folder);
            header('Location: ../../index.php');
        } else {
            echo '<p>Error the folder already exists or have you used a forbidden name!</p>';
            echo '<p><a href="../../index.php">Back</a></p>';
            //header('Location: ../../index.php');
            /*
            Error: The folder you have created is duplicated or its name is prohibited, please try again.
            */
        }
    }
}
