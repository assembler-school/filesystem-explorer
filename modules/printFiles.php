<?php
if ($openedFolder = opendir('../files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {

        if ($readFolder != "." && $readFolder != "..") {
            echo "<p>$readFolder <button class='fileBtn' data-path='$readFolder'>Info</button></p>";
        }
    }

    closedir($openedFolder);
}

?>