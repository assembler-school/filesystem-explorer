<?php
$text = $_GET['text'];
$path = $_GET['path'];

$text = $e_type = str_replace(' ', '_', $text);

$explodedPath = explode("/", $path);
$explodedPath[count($explodedPath) - 1] =  $text;

$newPath = implode("/", $explodedPath);

rename("." . $path, "." .  $newPath);

echo json_encode([
    "ok" => true,
    "newPath" => $newPath
]);
