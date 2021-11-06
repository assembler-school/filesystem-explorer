<?php
function getFilePath($file)
{
    //!getPath
    $explodePath = explode('/', $file);
    $rootPath = '';
    for ($i = 1; $i <= count($explodePath) - 1; $i++) {

        if ($explodePath[$i] !== '..') {
            $rootPath = $rootPath .  '/' . $explodePath[$i];
        }
    }

    //!getUri
    $uri = $_SERVER['REQUEST_URI'];

    if (isset($uri) && $uri !== null) {
        $uri = substr($uri, 1);
        $uri = explode('/', $uri);
        $uri = "$_SERVER[DOCUMENT_ROOT]" . "/" . $uri[0];
    } else {
        $uri = null;
    }
    $filePath = $uri . $rootPath;
    return $filePath;
}
