<?php 

    // Getting dirPath
    $dirPath = "./root";

    // Getting every item in dirPath
    $dirPathItemList = scandir($dirPath);

    // Renders items for current dirPath
    function renderDirItemList($dirPath, $dirPathItemList){
        for($i=2; $i<sizeof($dirPathItemList); $i++){
            $fileName = $dirPathItemList[$i];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            // Choosing file extension icon to render
            switch($fileActualExt){
                case 'doc':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-word-fill'></i></div>";
                    break;
                case 'csv':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-excel-fill'></i></div>";
                    break;
                case 'jpg':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-image-fill'></i></div>";
                    break;
                case 'png':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-image-fill'></i></div>";
                    break;
                case 'txt':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-text-fill'></i></div>";
                    break;
                case 'ppt':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-ppt-fill'></i></div>";
                    break;
                case 'odt':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-word-fill'></i></div>";
                    break;
                case 'pdf':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-pdf-fill'></i></div>";
                    break;
                case 'zip':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-zip-fill'></i></div>";
                    break;
                case 'rar':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-zip-fill'></i></div>";
                    break;
                case 'exe':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-code-fill'></i></div>";
                    break;
                case 'svg':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-image-fill'></i></div>";
                    break;
                case 'mp3':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-music-fill'></i></div>";
                    break;
                case 'mp4':
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-file-play-fill'></i></div>";
                    break;
                default:
                    $icon = "<div class='mainCenter__fileIcon'><i class='bi bi-folder-fill'></i></div>";
            }

            if(is_dir($dirPath."/".$fileName)){

                echo "
                    <div class ='fileWrapper'>
                        <a class='renderUpdateLink' href='./includes/manageDirItems.php?updateDir'>"
                            .$icon.
                            "<div class='mainCenter__fileName'>".$fileName."</div>
                        </a>
                        <i class='renderOptions bi bi-three-dots-vertical'></i>
                    </div>
                ";

            }else{

                echo "
                    <div class ='fileWrapper'>"
                        .$icon.
                        "<div class='mainCenter__fileName'>".$fileName."</div>
                        <i class='renderOptions bi bi-three-dots-vertical'></i>
                    </div>
                ";

            }
        }
    }
?>