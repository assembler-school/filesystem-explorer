<?php 

    if(isset($_POST['submitFolder'])){

        // Establish root directory
        $root = "../root";

        // Getting folderName input value
        $folderName = $_POST['folderName'];

        // Completing directory path
        $finalDirectoryPath = $root."/".$folderName;

        // Create new folder permissions (0777 means everything allowed)
        mkdir($finalDirectoryPath, 0777);

        header("Location: ../index.php?foldercreationsuccess");
    }

?>