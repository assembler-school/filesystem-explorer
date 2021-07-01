<?php 

    require("./updateDir.php");

    if(isset($_POST['submitFolder'])){

        // Establish folderUploadDir directory
        $folderUploadDir = $_SESSION['currentPath'];

        // Getting folderName input value
        $folderName = $_POST['folderName'];

        // Completing directory path
        $finalDirectoryPath = $folderUploadDir."/".$folderName;

        // Create new folder permissions (0777 means everything allowed)
        mkdir($finalDirectoryPath, 0777);

        header("Location: ../index.php?foldercreationsuccess");
    }

?>