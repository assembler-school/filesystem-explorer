<?php

$generalDir = "root/folder1";

if (isset($_FILES["uploadFile"])) {
    print_r($_FILES["uploadFile"]);

    $fileName = $_FILES["uploadFile"]["name"];
    move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $generalDir . "/" . $fileName);
    header("Location: index.php");
}
