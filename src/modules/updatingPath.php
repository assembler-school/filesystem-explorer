<?php
session_start();

// Update path
$_SESSION["currentPath"] = $_GET["updatedPath"];

// Resetting search to default
$_SESSION["isSearching"] = false;
$_SESSION["searchText"] = "";

// Redirecting
header("Location:../index.php");
