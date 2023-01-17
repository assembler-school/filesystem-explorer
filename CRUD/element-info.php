<?php
if (!isset($_SESSION)) {
    session_start();
}

// $file = $_SESSION['absPath'];

function showFileInfo($file)
{
    $sizeInKb = filesize($file) / 1024;
    $sizeInMb = $sizeInKb / 1024;
    echo basename($file) . PHP_EOL . "<br>";
    if ($sizeInKb < 1024) {
        echo "<br>";
        echo round($sizeInKb, 1) . "KB";
        echo '<p>Creation date: <br>' . date("F d Y H:i:s.", filectime($file)) . '</p>';
        echo '<p>Updating date: <br>' . date("F d Y H:i:s.", fileatime($file)) . '</p>';
    } else {
        echo round($sizeInMb, 1) . "MB";
        echo '<p>Creation date: <br>' . date("F d Y H:i:s.", filectime($file)) . '</p>';
        echo '<p>Updating date: <br>' . date("F d Y H:i:s.", fileatime($file)) . '</p>';
    }
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    echo $ext;
}

$dir = $_SESSION['absPath'];

function showFolderInfo($dir)
{
    $path = $dir;
    $Directory = new RecursiveDirectoryIterator($path);
    $Iterator = new RecursiveIteratorIterator($Directory);
    echo basename($dir) . PHP_EOL . "<br>";
    $totalFilesize = 0;
    foreach ($Iterator as $file) {
        if ($file->isFile()) {
            $totalFilesize += $file->getSize();
        }
    }
    $FilesizeInKb = $totalFilesize / 1024;
    $FilesizeInMb = $FilesizeInKb / 1024;
    if ($FilesizeInKb < 1024) {
        echo "Size: " . round($FilesizeInKb, 1) . "KB";
    } else {
        echo "Size: " . round($FilesizeInMb, 1) . "MB";
    }
    echo '<p>Creation date: <br>' . date("F d Y H:i:s.", filectime($path)) . '</p>';
    echo '<p>Updating date: <br>' . date("F d Y H:i:s.", fileatime($path)) . '</p>';
    
}
?>