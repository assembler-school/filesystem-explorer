<?php
session_start();
// echo "funciona";
// echo $_POST["folder-name"];
$openedFolder = $_POST["folder-name"];
if (isset($_SESSION["currentPath"])) {
    $_SESSION["currentPath"] .= "/" . $openedFolder;
} else {
    $_SESSION["currentPath"] = "/" . $openedFolder;
}
header("Location: ../index.php");
