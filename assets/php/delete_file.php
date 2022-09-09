<?php 
    deleteFile();

    function deleteFile(){
        $filepath = $_POST['file'];

        if (substr($filepath, 0, 3) == '(F)') {
            $dirpath = substr($filepath, 3);
            if (rmdir($dirpath)) {
                header ('Location: ../../index.php');
            } else {
                echo "Sorry, there was a problem deleting the directory.";
                echo '<p><a href="../../index.php">Back</a></p>';
            } 
        } else {
            if (unlink($filepath)) {
                header ('Location: ../../index.php');
            } else {
                echo "Sorry, there was a problem deleting the file.";
                echo '<p><a href="../../index.php">Back</a></p>';
            }
        }
    }
