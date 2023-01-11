<?php
$text = $_GET['text'];
$path = $_GET['path'];

$explodedPath = explode("/", $path);
$explodedPath[count($explodedPath) - 1] =  $text;

$newPath = implode("/", $explodedPath);

rename("." . $path, "." .  $newPath);

echo json_encode([
    "ok" => true,
    "newPath" => $newPath
]);
