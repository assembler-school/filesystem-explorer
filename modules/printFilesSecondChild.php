<?php
if ($openedFolder = opendir('./files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            if($fileActualExt==false){
                echo "<li data-path='$readFolder/' type='folder'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>$readFolder</span></li>";
            } else {
                $readFolderArray = explode(".", $readFolder);
                $readFolder = reset($readFolderArray);
                $readFolderExt = strtoupper(end($readFolderArray));
                if($fileActualExt==="png"){
                    echo "<li data-path='$readFolder/'><img class='folder-second-list-img' src='images/pngIcon.png' alt='folder'><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></li>";
                }
            }
        }
    }

    closedir($openedFolder);
}

?>