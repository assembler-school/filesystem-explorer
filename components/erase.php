<?php
if (isset($_GET["erase"])) {
    $url = '../' . $_GET['erase'];
    erase($url);
}

function erase($eraseDir)
{
    if (is_dir($eraseDir)) {
        foreach (glob("$eraseDir./*") as $file){
            erase($file);    
            }
        rmdir($eraseDir); 
        }
     else {
        unlink($eraseDir);
    }

    $path = explode("/", $eraseDir);

    array_shift($path);
    array_pop($path);
    $directory = implode("/", $path);


    header("Location: ../index.php?directory=$directory");
}
