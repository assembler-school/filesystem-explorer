<?php
session_start();

if (isset($_SESSION["path"])) {
  if (isset($_REQUEST["valid"])) {
    $_SESSION["prevPath"] = $_SESSION["path"];
    $_SESSION["path"] = $_POST["path"];
    $sessionPath = $_SESSION["path"];
  }
} else {
  $_SESSION["prevPath"] = "";
  $_SESSION["path"] = '/xampp/htdocs/filesystem-explorer/src/UNIT';
  $sessionPath = $_SESSION["path"];
}

$sessionPath = $_SESSION["path"];
echo $sessionPath;
