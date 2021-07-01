<?php
session_start();

$searchValue = $_POST["searchValue"];
$matchedFiles = $_SESSION["matchedFiles"];

if ($searchValue != null) {
    $_SESSION["isSearching"] = true;
} else {
    $_SESSION["isSearching"] = false;
}

$matchedFiles = array_filter($_SESSION["searchFiles"], function ($file) {
    if (str_contains($file["name"], $_POST["searchValue"]))
        return $file;
});

// Reassinging value
$_SESSION["matchedFiles"] = $matchedFiles;
$_SESSION["searchText"] = $searchValue;


// Redirecting
header("Location:../index.php");
