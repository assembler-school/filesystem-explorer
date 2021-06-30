<?php
session_start();

$target_dir = "../" . $_SESSION["currentPath"];
$target_file =  $target_dir . "/" . basename($_FILES["uploadedFile"]["name"]);
$uploadedFile = $_FILES["uploadedFile"];

// Only uploading if file doesn't exist
if (!file_exists($target_file)) {
    move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file);

    // Redirecting
    header("Location:../index.php");
} else {
    echo "Error uploading";

    // Redirecting
    header("Location:../index.php");
}
