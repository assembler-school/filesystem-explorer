<?php

if(isset($_POST["submit"])){
    $file = $_FILES["file"];

    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileNameNew=uniqid('', true).".".$fileActualExt;
    $fileDestination = "root/".$fileNameNew;

    move_uploaded_file($fileTmpName, $fileDestination);

}