<?php 

function showFiles($filePath) {

}


$target_dir = __DIR__ .'/root';
$dirFiles = scandir($target_dir);

unset($dirFiles[array_search('.', $dirFiles)]);
unset($dirFiles[array_search('..', $dirFiles)]);



