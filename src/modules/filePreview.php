<?php
session_start();

// Required files
// require_once("../fileStats.php");

$filePath = $_GET["filePath"];
// $fileName = $_GET["fileName"];

echo $filePath;

header("Location:../index.php");
