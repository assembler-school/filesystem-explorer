<?php
if ($openedFolder = opendir('./files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            if($fileActualExt==false){
                if (is_dir($readFolder)) {
                    echo "<li class='first-list' data-path='$readFolder/' type='folder'><img class='folder-list-img' src='images/folderIconSmallx3.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
                }else{
                    echo "<li class='first-list' data-path='$readFolder/' type='folder'><img class='arrow-rigth' src='images/arrowRigth.png' alt='right arrow icon'><img class='folder-list-img' src='images/folderIconSmallx3.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
                }
            } else if($fileActualExt==="doc"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/docIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="csv"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/csvIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="jpg"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/jpgIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="jpeg"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/jpgIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="png"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/pngIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="txt"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/txtIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="ppt"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/pptIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="odt"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/odtIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="pdf"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/pdfIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="zip"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/zipIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="rar"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/rarIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="exe"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/exeIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="svg"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/svgIcon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="mp3"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/mp3Icon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="mp4"){
                echo "<li class='first-list' data-path='$readFolder/' type='file'><img class='folder-list-img' src='images/mp4Icon.png' alt='file'><span class='text-list'>$readFolder</span></li>";
            }
        }
    }

    closedir($openedFolder);
}

/* function dir_is_empty($dir) {
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
        closedir($handle);
        return false;
    }
    }
    closedir($handle);
    return true;
} */


?>