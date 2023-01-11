<?php
if ($openedFolder = opendir('../files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            echo "<li>$readFolder</li>";
            /* echo json_encode($readFolder); */
        }
    }

    closedir($openedFolder);
}

?>