<?php
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $folderPath = "root";
    if (filetype($folderPath) == "dir") {
        $dh = opendir($folderPath);
        // print_r($dh);
        while (($folder = readdir($dh)) !== false) {
            if ($folder === "." || $folder === "..") {
            } else {
                $folderPath = $folderPath . "/" . $folder;
                if ($search == $folder) {
                    echo $folderPath;
                }

                if (filetype($folderPath) == "dir") {
                    $dh = opendir($folderPath);
                    while (($folder = readdir($dh)) !== false) {
                        if ($folder === "." || $folder === "..") {
                        } else {
                            $folderPath = $folderPath . "/" . $folder;
                            if ($search == $folder) {
                                echo $folderPath;
                            }
                        }
                    }
                }
            }
        }
    }
}

function readDirectory($search, $folderPath)
{
    if (filetype($folderPath) == "dir") {
        $dh = opendir($folderPath);
        while (($folder = readdir($dh)) !== false) {
            if ($folder === "." || $folder === "..") {
            } else {
                $folderPath = $folderPath . "/" . $folder;
                if ($search == $folder) {
                    echo $folderPath;
                }
            }
        }
    }
}


// if (is_dir($directory)) {
//     if ($dh = opendir($directory)) {
//         while (($file = readdir($dh)) !== false) {
//             if ($file === "." || $file === "..") {
//             } else {
//                 if (filetype("$directory/$file") == "dir") {
//                     echo "<div><a class='folder' href=index.php?directory=" . $directory . "/" . $file . ">$file</a></div>";
//                 } else {
//                     // echo "<a class='file' href=index.php?directory=" . $directory . "/" . $file . ">$file</a>";
//                     echo "<div>$file</div>";
//                 }
//             }
//         }
//         closedir($dh);
//     }
// }

?>

<div class="search__container">
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Search file or folder">
        <input type="submit" value="Search">
    </form>


</div>