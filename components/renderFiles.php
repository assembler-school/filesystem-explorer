<?php

function readDirectory($search, $folderPath)
{
    if (is_dir($folderPath)) {
        if ($dh = opendir($folderPath)) {
            while (($found = readdir($dh)) !== false) {
                if ($found === "." || $found === "..") {
                } else {

                    if (str_contains($found, $search)) {
                        $fullPath = $folderPath . '/' . $found;
                        printDirectory($fullPath);
                    }
                    if (filetype($folderPath) == "dir") {
                        // $folderPath = $folderPath . '/' . $folder;
                        readDirectory($search, $folderPath . '/' . $found);
                    }
                }
            }
        }
        closedir($dh);
    }
}

function printDirectory($fullPath)
{
    $modificationDate = date("d F Y H:i:s.", filemtime($fullPath));
    $creationDate = date("d F Y H:i:s.", filectime($fullPath));
    $fileSize = filesize($fullPath) / 100 . " KB";
    $ext = pathinfo($fullPath, PATHINFO_EXTENSION);

    if (is_dir($fullPath)) {
        if (PHP_OS == "WINNT") {
            echo "
                <div class='row'>
                    <a class='col text-truncate' class='folder' href=index.php?directory=$fullPath>
                        <p>$fullPath</p>
                    </a>
                    <p class='col'>$creationDate</p>
                    <p class='col'>$modificationDate</p>
                    <p class='col'>Folder</p>
                    <p class='col'>$fileSize</p>
                    <a class='col' href='components/erase.php?erase=$fullPath'><button>x</button></a>
                </div>
                <hr>";
        } else {
            echo "
                <div class='row'>
                    <a class='col text-truncate' class='folder' href=index.php?directory=$fullPath>
                        <p>$fullPath</p>
                    </a>
                    <p class='col'>Unknown</p>
                    <p class='col'>$modificationDate</p>
                    <p class='col'>$fileSize</p>    
                </div>
                <hr>";
        }
    } else {
        if (PHP_OS == "WINNT") {
            echo "
                    <div class='row'>
                        <p class='col text-truncate'>$fullPath</p>
                        <p class='col'>$creationDate</p>
                        <p class='col'>$modificationDate</p>
                        <p class='col'>$ext</p>
                        <p class='col'>$fileSize</p>
                        <a class='col' href='components/erase.php?erase=$fullPath'><button>x</button></a>
                    </div>
                <hr>";
        } else {
            echo "
                    <div class='row'>
                        <p class='col text-truncate' >$fullPath</p>
                        <p class='col' >Unknown</p>
                        <p class='col' >$modificationDate</p>
                        <p class='col' >$ext</p>
                        <p class='col' >$fileSize</p>
                    </div>
                <hr>";
        }
    }
}

if (!isset($_GET["search"])) {
    if (isset($_GET["directory"]) && explode("/", $_GET["directory"])[0] == "root" && !str_contains($_GET["directory"], "..")) {
        $directory =  $_GET["directory"];
    } else {
        $directory = 'root';
    }
    scandir($directory, SCANDIR_SORT_ASCENDING);
    if (is_dir($directory)) {
        if ($dh = opendir($directory)) {
            while (($file = readdir($dh)) !== false) {
                if ($file === "." || $file === "..") {
                } else {
                    $fullPath = "$directory/$file";
                    printDirectory($fullPath);
                }
            }
            closedir($dh);
        }
    }
} else {
    $search = $_GET["search"];
    $folderPath = "root";
    readDirectory($search, $folderPath);
}
