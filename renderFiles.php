<?php
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
                    if (filetype("$directory/$file") == "dir") {
                        echo "<div><a class='folder' href=index.php?directory=" . $directory . "/" . $file . ">$file</a><a href=erase.php?erase=$directory/$file><button>x</button></a></div>";
                    } else {
                        echo "<div><a class='file' href=index.php?directory=" . $directory . "/" . $file . ">$file</a><a href=erase.php?erase=$directory/$file><button>x</button></a></div>";
                    }
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
                            if (is_dir($folderPath . '/' . $found)) {
                                echo "<div class='folder'>$folderPath</div>";
                            } else {
                                echo "<div class='file'>$folderPath</div>";
                            }
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
