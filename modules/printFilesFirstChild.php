<?php
if ($openedFolder = opendir('./files')) {

    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            if($fileActualExt==false){
                echo "<li class='first-list' data-path='$readFolder/' type='folder'><img class='folder-list-img' src='images/folderIconSmallx3.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="doc"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/docIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="csv"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/csvIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="jpg"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/jpgIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="jpeg"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/jpgIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="png"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/pngIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="txt"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/txtIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="ppt"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/pptIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="odt"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/odtIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="pdf"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/pdfIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="zip"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/zipIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="rar"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/rarIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="exe"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/exeIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="svg"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/svgIcon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="mp3"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/mp3Icon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            } else if($fileActualExt==="mp4"){
                echo "<li class='first-list' data-path='$readFolder/'><img class='folder-list-img' src='images/mp4Icon.png' alt='folder'><span class='text-list'>$readFolder</span></li>";
            }
        }
    }

    closedir($openedFolder);
}

?>