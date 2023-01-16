<?php
session_start();

$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['name'];
$path = $absolutePath . "/" . $fileName;
$type = $_POST['type'];

if($type == ".txt"){
    file_put_contents($path, "");
}else mkdir($path);

echo json_encode("ok");

?>