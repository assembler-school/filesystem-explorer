<?php
    moveFile();

    function moveFile() {
        $source = $_POST['file'];
        if (substr($source,0 , 3) == '(F)') {
            $source = substr($source, 3);
        }
        $destination = $_POST['destination'].basename($source);
        rename($source, $destination);
        header('Location: ../../index.php');
    }