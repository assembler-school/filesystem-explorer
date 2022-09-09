<?php
    storeFile();

    function storeFile() {
        $target_dir = $_POST['directory'];
        $filename = $_POST['filename'];
        $path = $_FILES['userfile']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $target_file = $target_dir . $filename . '.' . $ext;
        print_r($target_dir . $filename . '.' . $ext);
        
        if (!file_exists($target_file)) {
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) {
                header ('Location: ../../index.php');
            } else {
                echo "<p>¡Posible ataque de subida de ficheros!</p>";
                echo '<p><a href="../../index.php">Back</a></p>';
            }
        } else {
            echo "Sorry, file already exists.";
            echo '<p><a href="../../index.php">Back</a></p>';
        }
    }