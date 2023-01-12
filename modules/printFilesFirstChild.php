<?php
if ($openedFolder = opendir('./files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            if($fileActualExt==false){
                echo "<li class='first-list' data-path='$readFolder/' type='folder'><img class='folder-list-img' src='images/folderIconSmallx3.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="png"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/pngIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            }
        }
    }

    closedir($openedFolder);
}

?>