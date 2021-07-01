<?php
session_start();

$searchValue = $_POST["searchValue"];
$matchedFiles = $_SESSION["matchedFiles"];

// Managing searching session variable
if ($searchValue != null) {
    $_SESSION["isSearching"] = true;
} else {
    $_SESSION["isSearching"] = false;
}

// Filtered array with all found files
$matchedFiles = array_filter($_SESSION["searchFiles"], function ($file) {
    if (str_contains($file["name"], $_POST["searchValue"]))
        return $file;
});

// Reassinging value
$_SESSION["matchedFiles"] = $matchedFiles;
$_SESSION["searchText"] = $searchValue;

// Redirecting
header("Location:../index.php");
