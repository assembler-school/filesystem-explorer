<?php
if (!isset($_SESSION)) {
    session_start();
}

$file = $_SESSION['absPath'];

function showFileInfo($file)
{
    $sizeInKb = filesize($file) / 1024;
    $sizeInMb = $sizeInKb / 1024;
    echo '<h1>' . basename($file) . PHP_EOL . "</h1><br>";
    if ($sizeInKb < 1024) {
        echo "<br>";
        echo '<b>Size: </b>' . round($sizeInKb, 1) . " <b>KB</b>";
        echo '<p><b>Creation date: </b><br>' . date("F d Y H:i:s.", filectime($file)) . '</p>';
        echo '<p><b>Updating date: </b><br>' . date("F d Y H:i:s.", fileatime($file)) . '</p>';
    } else {
        echo round($sizeInMb, 1) . " <b>MB</b>";
        echo '<p><b>Creation date: </b><br>' . date("F d Y H:i:s.", filectime($file)) . '</p>';
        echo '<p><b>Updating date: </b><br>' . date("F d Y H:i:s.", fileatime($file)) . '</p>';
    }
    echo 'Extension: ' .  $file = pathinfo($file, PATHINFO_EXTENSION);
}

$dir = $_SESSION['absPath'];

function showFolderInfo($dir)
{

    $path = $dir;
    $Directory = new RecursiveDirectoryIterator($path);
    $Iterator = new RecursiveIteratorIterator($Directory);

    $totalFilesize = 0;
    foreach ($Iterator as $file) {
        if ($file->isFile()) {
            $totalFilesize += $file->getSize();
        }
    }

    $FilesizeInKb = $totalFilesize / 1024;
    $FilesizeInMb = $FilesizeInKb / 1024;
    echo '<h1>' . basename($dir) . PHP_EOL . "</h1><hr><br>";
    if ($FilesizeInKb < 1024) {
        echo "<b>Size: </b>" . round($FilesizeInKb, 1) . " <b>KB</b>";
    } else {
        echo "<b>Size:</b> " . round($FilesizeInMb, 1) . " <b>MB</b>";
    }
    echo '<p><b>Creation date: </b><br>' . date("F d Y H:i:s.", filectime($path)) . '</p>';
    echo '<p><b>Updating date: </b><br>' . date("F d Y H:i:s.", fileatime($path)) . '</p>';

}

?>

