<?php
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $folderPath = "root";

    readDirectory($search, $folderPath);
}



function readDirectory($search, $folderPath)
{
    if (is_dir($folderPath)) {
        if ($dh = opendir($folderPath)) {
            while (($found = readdir($dh)) !== false) {
                if ($found === "." || $found === "..") {
                } else {

                    if ($search == $found) {
                        echo "<div>$folderPath</div>";
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

?>

<div class="search__container">
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Search file or folder">
        <input type="submit" value="Search">
    </form>


</div>