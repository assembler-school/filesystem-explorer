<?php

function createFolder()
{
    $currentPath = $_GET['path'];
    $filePath = $_GET['filepath'];

    // $pathName = str_replace('\\', '/', dirname(__DIR__))  . $currentPath;

    $version = time();

    mkdir("$currentPath/newFolder$version", 0700, false);

    $dir = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename("$currentPath/newFolder"));

    echo json_encode([
        "ok" => true,
        "dir" => $dir,
        "path" => $filePath.'/newFolder'.$version
    ]);
}
createFolder();