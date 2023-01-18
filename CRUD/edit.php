<?php
if(!isset($_SESSION)){
    session_start();
}

$absPath = $_SESSION["absPath"];

if (isset($_POST["btn-edit"])) {
    $newNameFolder = $_POST["edit"];
    $absRoot = $_SESSION["absPath"];
    $dir = $_SESSION["altPath"];

    rename($absRoot, './root/' . $newNameFolder);
}
?>
