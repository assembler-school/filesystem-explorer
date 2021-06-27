<?php 

    if(isset($_POST['submitFolder'])){

        // Establish root directory
        $root = "../root";

        // Getting folderName input value
        $folderName = $_POST['folderName'];

        // Completing directory path
        $finalDirectoryPath = $root."/".$folderName;

        // Create new folder
        mkdir($finalDirectoryPath, 0777);

        header("Location: ../index.php?foldercreationsuccess");
    }

?>