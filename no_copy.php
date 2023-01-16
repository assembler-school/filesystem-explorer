<?php

session_start();
$root = $_SESSION['absolutePath'];
$name = $_REQUEST['name'];
$path = $root . '/' . $name;
unset($_SESSION["moves"][$name]);
echo json_encode($name);