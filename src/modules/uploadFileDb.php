<?php
$target_dir = "../root/";
$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
$uploadedFile = $_FILES["uploadedFile"];

move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file);
echo "Uploaded file!";
