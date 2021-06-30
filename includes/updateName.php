<?php 
    if(isset($_POST['submitRename'])){
        
        // Getting current dirPath
        $dirPath = "../root/";
        echo $dirPath;

        // Getting all items in this dirPath
        $dirItemList = scandir($dirPath);

        // Searching item name to change and changing its name
        $itemToChangeIndex = array_search($_POST['oldName'], $dirItemList);
        rename($dirPath.$dirItemList[$itemToChangeIndex],$dirPath.$_POST['newName']);
       
        // Redirect to index.php
       header("Location: ../index.php?renamesuccess");
    }

    // if (isset($_POST["rename"]) && isset($_POST["newName"])) {
    //     $fileName = explode(".", $file["name"])[0];
    //     $rpName = str_replace($fileName, $_POST["newName"], $file["path"]);
    //     if ($fileName === $_POST["rename"]) {
    //     rename($file["path"], $rpName);
    //     header("Location: ../index.php?renamed=true");
    //     }
    //     }
?>