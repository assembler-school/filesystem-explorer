<?php
session_start();

$_SESSION["currentPath"] = $_GET["updatedPath"];
header("Location:../index.php");
