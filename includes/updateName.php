<?php 
    if(isset($_POST['submitRename'])){
        print_r($_POST);
    }

    if (isset($_POST["rename"]) && isset($_POST["newName"])) {
        $fileName = explode(".", $file["name"])[0];
        $rpName = str_replace($fileName, $_POST["newName"], $file["path"]);
        if ($fileName === $_POST["rename"]) {
        rename($file["path"], $rpName);
        header("Location: ../index.php?renamed=true");
        }
        }
?>