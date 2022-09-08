<?php
    storeFile();

    function storeFile() {
        if ($_FILES['userfile']['name']!=""){
            $target_dir = $_POST['directory'];
            $file = $_FILES['userfile']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['userfile']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;

            if (file_exists($path_filename_ext)) {
                    echo "Sorry, file already exists. <br><br> <a href='../../index.php'>Go back</a>";
                } else {
                    move_uploaded_file($temp_name,$path_filename_ext);
                    header('Location: ../../index.php');
            }
        }
    }
    