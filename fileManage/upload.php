<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    //Get extension in variable $fileExt
    $fileExploded = explode('.', $fileName);
    $fileExt = strtolower(end($fileExploded));

    $allowedExt = array('doc', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 
                        'pdf', 'zip', 'rar', 'svg', 'mp3', 'mp4');
    if (in_array($fileExt, $allowedExt)) {
        if ($fileError == 0) {
            // $fileNameUnique = uniqid('','true').".".$fileExt;
            $fileDestination = 'uploads/'.$fileName;
            move_uploaded_file($fileTmp, $fileDestination);
            header("Location:../root.php");
        } else {
            echo "Upload error";
        }
    } else {
        echo "File extension not allowed";
    }
}