<?php
require_once("./utils.php");
session_start();
$newName = $_POST["newName"];
$oldName = $_POST["oldName"];
$extension = Utils::getFileExtension($oldName);
$newPath = $_SESSION['absolutePath'] . "/" . $newName . ".$extension";
$oldPath = $_SESSION['absolutePath'] . "/" .$oldName;


$msg=1;
if(!rename($oldPath,$newPath)) {
    $msg= 0;
}

echo json_encode($msg);

?>