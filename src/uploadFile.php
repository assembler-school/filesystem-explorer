<?php

session_start();
$completePath = $_SESSION['currentPath'];

$generalDir = substr($completePath, strpos($completePath, "root"));

if (isset($_FILES["uploadFile"])) {

    $fileName = $_FILES["uploadFile"]["name"];
    move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "../" . $generalDir . "/" . $fileName);
    header("Location: ../index.php");
}
