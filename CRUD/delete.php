<?php
// if(!isset($_SESSION)) {
//     session_start();
// }


// $file = $_SESSION["absPath"];

// echo $file;            
//             if (is_dir($file)) {
//                 rmdir($file);
//                 echo ("Folder $file has been deleted.");
//             }
//             else {
//                 unlink($file);
//                 echo ("File $file has been deleted.");
//             }
//             echo json_encode("File delete succefully!");




$path = $_SESSION['absPath'];


function deleteItem($path){
    
    if(isset($_POST['delete'])){
        if (is_dir($path)){
            array_map("rmdir", glob("$path/"));
            rmdir($path);
        }
        else{
            array_map("unlink", glob("$path/"));
            unlink($path);
        }
    }
}
deleteItem($path);




?>