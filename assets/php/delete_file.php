<?php 
    deleteFile();

    function deleteFile(){
        $filepath = $_POST['file'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> c4add03c8b5c7566dd24ae7abf36711bc0f25988
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
<<<<<<< HEAD
=======
=======

        if (unlink($filepath)) {
            header ('Location: ../../index.php');
        } else {
            echo "Sorry, there was a problem deleting the file.";
            echo '<p><a href="../../index.php">Back</a></p>';
>>>>>>> ee5e19a2468c803f6fb5d95f940d86cdcd485d9c
>>>>>>> c4add03c8b5c7566dd24ae7abf36711bc0f25988
        }
    }