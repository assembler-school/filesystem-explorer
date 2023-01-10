<?php
session_start();
$path = $_GET['path'];

$_SESSION['curr_path'] = $path;
echo json_encode([
    "ok" => true,
    "path" => $path
]);
