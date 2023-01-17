<?php


$arrayPrint = array();

if(is_dir("../trash")){
    $openedFolder = opendir('../trash');
    
    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            $dataNewPath = "/".$readFolder;
            if($fileActualExt==false){
                array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>$readFolder</span></div>");
            } else {
                $readFolderArray = explode(".", $readFolder);
                $readFolder = reset($readFolderArray);
                $readFolderExt = strtoupper(end($readFolderArray));
                if($fileActualExt==="doc"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/docIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="csv"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/csvIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="jpg"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/jpgIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="jpeg"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/jpgIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="png"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/pngIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="txt"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/txtIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="ppt"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/pptIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="odt"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/odtIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="pdf"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/pdfIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="zip"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/zipIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="rar"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/rarIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="exe"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/exeIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="svg"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/svgIcon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="mp3"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/mp3Icon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
                else if($fileActualExt==="mp4"){
                    array_push($arrayPrint, "<div class='first-list second-flex' data-path='$dataNewPath/' type='trash'><img class='folder-second-list-img' src='images/mp4Icon.png' alt=''><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></div>");
                }
            }
        }
    }
    echo json_encode($arrayPrint);
    closedir($openedFolder);
} else {
    echo json_encode("The directory does not exist");
}

?>