<?php

header("Location: index.php");

$newFileName = $_POST["newFile"];
$root = "root/";
mkdir($root . $newFileName);
