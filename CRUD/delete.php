<?php

$path = $_SESSION['absPath'];

function deleteItem($path){

    if(isset($_POST['delete'])){
        if (is_dir($path)){
             rmdir($path);
        }
        else{
             unlink($path);
        }
    }
}
deleteItem($path);

?>