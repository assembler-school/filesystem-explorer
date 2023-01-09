<?php

$username = "admin";
$inputPassword = "123456";


if (isset($_POST["user"]) && isset($_POST["password"])) {
    
    if ($_POST["user"] == $username && $_POST["password"] == $inputPassword) {
       
        session_start();
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["password"] = $_POST["password"];

        header("Location: ../root/panel.php");
    } else {
        header("Location: ./index.php?msg=errorLogin");
}}
?>

