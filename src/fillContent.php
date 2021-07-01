<?php
function getFilter()
{
    return isset($_GET['search']) ? $_GET['search'] : '';
}

function getDirectories(string $dir = './root')
{
    $filter = getFilter();
    return $filter
        ? array_filter(glob($dir . '/*', GLOB_ONLYDIR), function ($fileName) use ($filter) {
            return str_contains(basename($fileName), $filter);
        })
        : glob($dir . '/*', GLOB_ONLYDIR);
}

function getFiles(string $dir = './root')
{
    $filter = getFilter();
    return $filter
        ? array_filter(glob($dir . '/*'), function ($fileName) use ($filter) {
            return is_file($fileName) && str_contains(basename($fileName), $filter);
        })
        : array_filter(glob($dir . '/*'), 'is_file');
}

function human_filesize($bytes, $dec = 2)
{
    $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
