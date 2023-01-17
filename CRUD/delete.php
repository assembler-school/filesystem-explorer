<?php

// $file = $_SESSION["absPath"];

// $path = $_SESSION["absPath"];
            
//             if (is_dir($file)) {
//                 rmdir($file);
//                 echo ("Folder $file has been deleted.");
//             }
//             else {
//                 unlink($file);
//                 echo ("File $file has been deleted.");
//             }
//             // echo json_encode("File delete succefully!");




$path = $_SESSION['absPath'];
// array_map("unlink", glob($path));

function delete($path){

    if(isset($_POST['delete'])){
        if (is_dir($path)){
             rmdir($path);
        }
        else{
             unlink($path);
        }
    }
}
delete($path);



?>