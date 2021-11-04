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
                        echo "<div class='container text-center'><p>$folderPath</p></div>";
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

<div class="container d-flex align-items-center justify-content-center">
    <form method="GET" action="index.php" class="search__form d-flex align-items-center justify-content-center">
        <input type="text" name="search" placeholder="Search file or folder" class="form-control">
        <input class="btn btn-info" type="submit" value="Search">
    </form>


</div>