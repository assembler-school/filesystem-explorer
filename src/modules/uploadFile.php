<?php

$target_dir = dirname(__DIR__);




$target_file = $target_dir . basename($_FILES["file"]["name"]);
$fileTempName = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];


$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = array('jpg', 'jpeg', 'png', 'mp3', 'doc', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp4');


if (isset($_POST['submit'])) {

    if (!in_array($fileType, $allowed)) {
        echo "You cannot upload this file";
    } else {
        try {
            move_uploaded_file($fileTempName, $newR);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        header("Location: ../index.html ");
    }
}
