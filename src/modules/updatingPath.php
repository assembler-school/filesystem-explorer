<?php
session_start();

// Update path
$_SESSION["currentPath"] = $_GET["updatedPath"];
// Reset searching boolean to default 
$_SESSION["isSearching"] = false;

// Redirecting
header("Location:../index.php");
