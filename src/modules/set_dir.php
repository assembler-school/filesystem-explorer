<?php
session_start();

// Setting our first path or getting it to refresh the scandir
if (!isset($_SESSION["currentPath"])) {
  $_SESSION["currentPath"] = $rootPath;
} else {
  $currentPath = $_SESSION["currentPath"];
}

// Getting files and folders from directory
$filesDir = scandir($_SESSION["currentPath"]);
