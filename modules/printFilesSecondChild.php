<?php

$dataPath = $_REQUEST["dataPathSecond"];

$arrayPrint = array();

if(is_dir("../files/".$dataPath)){
    $openedFolder = opendir('../files/'.$dataPath);
    
    while (false !== ($readFolder = readdir($openedFolder))) {
        
        if ($readFolder != "." && $readFolder != "..") {
            $fileExt = pathinfo($readFolder, PATHINFO_EXTENSION);
            $fileActualExt = strtolower($fileExt);
            $dataNewPath = $dataPath."/".$readFolder;
            if($fileActualExt==false){
                array_push($arrayPrint, "<li data-path='$dataNewPath/' type='folder'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>$readFolder</span></li>");
            } else {
                $readFolderArray = explode(".", $readFolder);
                $readFolder = reset($readFolderArray);
                $readFolderExt = strtoupper(end($readFolderArray));
                if($fileActualExt==="png"){
                    array_push($arrayPrint, "<li data-path='$dataNewPath/' ><img class='folder-second-list-img' src='images/pngIcon.png' alt='folder'><span class='text-second-list'>$readFolder</span><span class='extesion-file'>$readFolderExt</span></li>");
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