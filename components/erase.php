<?php

function erase($eraseDir)
{
    print_r($eraseDir);
    if (is_dir($eraseDir)) {
        rmdir($eraseDir);
    } else {
        unlink($eraseDir);
    }

    $path = explode("/", $eraseDir);

    array_shift($path);
    array_pop($path);
    $directory = implode("/", $path);


    header("Location: ../index.php?directory=$directory");
}

if (isset($_GET["erase"])) {
    erase('../' . $_GET['erase']);
}
