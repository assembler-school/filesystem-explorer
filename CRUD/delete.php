<?php

function deleteFile($delete) {
    { 
        if(isset($_POST["delete"])) {
            $fileName = $_SESSION["absPath"];
            $fileName2 = $_SESSION["altPath"];
            echo $fileName;
            echo $fileName2; 
            if ( file_exists($fileName2)) {
                unlink($fileName); 
            }elseif(is_dir($fileName)) {
                rmdir($fileName); 
            }
        }
       
    } 
    
}

?>