<?php

function printDirectory($fullPath)
{
    $modificationDate = date("d F Y H:i:s.", filemtime($fullPath));
    $creationDate = date("d F Y H:i:s.", filectime($fullPath));
    $ext = pathinfo($fullPath, PATHINFO_EXTENSION);

    if (is_dir($fullPath)) {


        if (PHP_OS == "WINNT") {
            echo "
                <div class='folder'>
                    <a class='folder' href=index.php?directory=$fullPath>
                        <p>$fullPath</p>
                    </a>
                    <p>$creationDate</p>
                    <p>$modificationDate</p>
                    <p>$ext</p>
                </div>";
        } else {
            echo "
                <div class='folder'>
                    <a class='folder' href=index.php?directory=$fullPath>
                        <p>$fullPath</p>
                    </a>
                    <p>Unknown</p>
                    <p>$modificationDate</p>
                    <p>$ext</p>
                </div>";
        }
    } else {

        if (PHP_OS == "WINNT") {
            echo "
                <div>
                    <div class='file'>
                        <p>$fullPath</p>
                        <p>$creationDate</p>
                        <p>$modificationDate</p>
                        <p>$ext</p>
                    </div>
                </div>";
        } else {
            echo "
                <div>
                    <div class='file'>
                        <p>$fullPath</p>
                        <p>Unknown</p>
                        <p>$modificationDate</p>
                        <p>$ext</p>
                    </div>
                </div>";
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
                    // if (filetype("$directory/$file") == "dir") {
                    //     echo "<div><a class='folder' href=index.php?directory=" . $directory . "/" . $file . ">$file</a>

                    //     <a href=erase.php?erase=$directory/$file><button>x</button></a></div>";
                    // } else {
                    //     echo "<div><a class='file' href=index.php?directory=" . $directory . "/" . $file . ">$file</a><a href=erase.php?erase=$directory/$file><button>x</button></a></div>";
                    // }
                    printDirectory($fullPath);
                }
            }
            closedir($dh);
        }
    }
} else {
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
        } else {
            // if (is_file($folderPath)) {
            //     echo "<div>$folderPath</div>";
            // }
        }
    }
    if (isset($_GET["search"])) {
        $search = $_GET["search"];
        $folderPath = "root";

        readDirectory($search, $folderPath);
    }
}
