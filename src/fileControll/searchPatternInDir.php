<?php
session_start();

if (isset($_REQUEST["valid"])) {
    $path = $_POST["path"];
    $pattern = $_POST["pattern"];

    echo "Search pattern is  $pattern
  ";
}
