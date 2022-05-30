<?php
if (isset($_POST['submit'])) {
    getTypeFile();
}

function getTypeFile()
{
    $target_dir = __DIR__;
    $newR =  $target_dir . "/root/" . $_POST['folder'];

    if (is_dir($newR)) {
        header("Location: ../index.php?{$newR}");
    } else {
        echo "is not a folder";
    }
}

function openFolder($dir)
{
    $ffs = scandir($dir);
    unset($ffs[array_search('.', $ffs)]);
    unset($ffs[array_search('..', $ffs)]);
    return $ffs;
}
