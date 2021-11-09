<?php

$_POST = json_decode(file_get_contents('php://input'), true);

echo json_encode(file_put_contents("../../drive".$_POST['filePath'], $_POST['data']));