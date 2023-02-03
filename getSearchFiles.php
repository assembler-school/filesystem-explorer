<?php
require_once('utils/utils.php');
$name = $_POST['name'];
$path = $_POST['path'];

$array = explode('\\root\\', $path);
$path = './root' . '/' . $array[1];
$path = str_replace('\\', '/', $path);
$size = Utils::formatSize(filesize($path));
$type = filetype($path);
$time = filemtime($path);
$relativePath = str_replace('./root/', '', $path);

date_default_timezone_set('Europe/Madrid');
$formattedTime = date("D d M Y", $time);

echo json_encode(["path" => $path, "size" => $size, "type" => $type, "time" => $formattedTime, "relative" => $relativePath]);