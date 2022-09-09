<?php 
    deleteFile();

    function deleteFile(){
        $filepath = $_POST['file'];

        if (unlink($filepath)) {
            header ('Location: ../../index.php');
        } else {
            echo "Sorry, there was a problem deleting the file.";
            echo '<p><a href="../../index.php">Back</a></p>';
        }
    }