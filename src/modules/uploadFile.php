<?php

$target_dir = __DIR__ ;



$target_file = $target_dir . basename($_FILES["file"]["name"]);
$fileTempName = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];



$newR =  $target_dir ."/root/" .$fileName;


$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = array('jpg', 'jpeg', 'png', 'mp3', 'doc', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp4');


if (isset($_POST['submit'])) {
    echo "first if <br>";
    if (!in_array($fileType, $allowed)) {
        echo "2 if <br>";
        echo "You cannot upload this file";
    } else {
        try {
            echo "3 if <br>";
            if (move_uploaded_file($fileTempName, $newR)) echo "uploaded <br>";;
            echo $newR;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        header("Location: ../index.html ");
    }
}
