<?php
session_start();

$absolutePath = $_SESSION['absolutePath'];
$fileName = $_POST['nameCreated'];
$path = $absolutePath . "/" . $fileName;  
$type = $_POST['select'];

if($type == ".txt"){
    file_put_contents($path . $type, "");
}else mkdir($path);

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

header("Location: index.php?p=$returnPath");
?>