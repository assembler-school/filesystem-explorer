<?php

$file = $_GET['filePath'];

$content = file_get_contents($file);
echo json_encode($content);

?>