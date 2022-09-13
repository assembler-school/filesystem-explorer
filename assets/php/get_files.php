<?php
    include_once ("new_file_index.php");
    function getFolders($path) {
        if(is_dir($path)) {
            if ($handle = opendir($path)) {
                echo '<ul>';
                $files = [];
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry !="..") {
                        array_push($files, $entry);
                    }
                }
                for ($i = 0; $i < count($files); $i++) {
                    if(is_dir($path.'/'.$files[$i])) {
                        echo '<a href="./'.$files[$i].'.php"><li>'. $files[$i] . ' <i class="fa-solid fa-caret-right"></i></li></a>';
                        getFolders($path.'/'.$files[$i]);
                        newIndex($files[$i], $path.'/'.$files[$i], $_SESSION['page']);
                    }
                }
                echo '</ul>';
            }
        }
    }

    function getFiles($path) {
        if(is_dir($path)) {
            if ($handle = opendir($path)) {
                $files = [];
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry !="..") {
                        array_push($files, $entry);
                    }
                }
                for ($i = 0; $i < count($files); $i++) {
                    $thereAreFiles = false;
                    if(!is_dir($path.'/'.$files[$i])) {
                        $thereAreFiles = true;  
                    }
                    if ($thereAreFiles) {
                        echo '<h4 class="files-path">My Files'. substr($path, 6). '</h4>';
                        echo '<div class="files-container">';
                        for ($i = 0; $i < count($files); $i++) {
                            if(!is_dir($path.'/'.$files[$i])) {
                                $infoFile = pathinfo($path.'/'.$files[$i]);
                                echo '<a class="file-link" target="_blank" href="'.$path.'/'.$files[$i].'"><div class="found-file">';
                                echo '<div class="icon-text">';
                                echo '<img class="file-icon" src="./assets/img/'.$infoFile['extension'].'.png" alt="'.$infoFile['extension'].' logo" width="30px">';
                                if (strlen($infoFile['filename']) > 13) {
                                    echo '<span>'.substr($infoFile['filename'], 0, 10).'...</span>';
                                } else {
                                    echo '<span>'.$infoFile['filename'].'</span>';
                                }
                                echo '</div>';
                                    echo '<div class="info-file">'; 
                                    echo '<p>File name: '.$infoFile['filename'].'</p>';
                                    echo '<p>Extension: '.$infoFile['extension'].'</p>';
                                    if (filesize($path.'/'.$files[$i]) < 1000000) {
                                        echo '<p>Size: '. round(((filesize($path.'/'.$files[$i]))/1000), 2) .' Kb</p>';
                                    } else {
                                        echo '<p>Size: '. round(((filesize($path.'/'.$files[$i]))/1000000), 2) .' Mb</p>';
                                    }
                                    echo '<p>Created: '.date("D d M Y g:i a", filectime($path.'/'.$files[$i])).'</p>';
                                    echo '<p>Modified: '.date("D d M Y g:i a", filemtime($path.'/'.$files[$i])).'</p>';
                                    echo '</div>'; 
                                echo '</div></a>';
                            } 
                        }
                        echo '</div>';
                    }
                }

                for ($i = 0; $i < count($files); $i++) {
                    if(is_dir($path.'/'.$files[$i])) {
                        getFiles($path.'/'.$files[$i]);
                    }
                }
            }
        }
    }
