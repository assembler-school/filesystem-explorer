<?php
function getExtension($path){
    return pathinfo($path, PATHINFO_EXTENSION);
}

function getFileIcon($path){
    $icons = [
        'doc' => 'file-word',
        'csv' => 'file-csv',
        'jpg' => 'file-image',
        'png' => 'file-image',
        'txt' => 'file-word',
        'ppt' => 'file-powerpoint',
        'odt' => 'file-powerpoint',
        'pdf' => 'file-pdf',
        'zip' => 'file-zipper',
        'rar' => 'file-zipper',
        'exe' => 'file',
        'svg' => 'file-image',
        'mp3' => 'file-audio',
        'mp4' => 'file-video'
    ];

    return isset($icons[getExtension($path)]) ? $icons[getExtension($path)] : 'file';
}