<?php


$_POST = json_decode(file_get_contents('php://input'), true);

$filePath = $_POST['filePath'];
$linesFile = file("../../drive".$filePath);

$data = '';

foreach($linesFile as $line) {
  $data .= $line;
}

echo json_encode($data);