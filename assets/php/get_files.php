<?php
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
                        echo '<li id="'.$path.'/'.$files[$i].'">'. $files[$i] . '</li>';
                        getFolders($path.'/'.$files[$i]);
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
                                $ext = substr($files[$i], -3);
                                echo '<a class="file-link" target="_blank" href="'.$path.'/'.$files[$i].'"><div class="found-file">';
                                echo '<div class="icon-text">';
                                echo '<img src="./assets/img/'.$ext.'.png" alt="'.$ext.' logo" width="60px">';
                                echo '<span>'.$infoFile['filename'].'</span>';
                                echo '</div>';
                                    echo '<div class="info-file">'; 
                                    echo '<p>Extension: '.$infoFile['extension'].'</p>';
                                    echo '<p>Size: '. round(((filesize($path.'/'.$files[$i]))/1000000), 3) .' Mb</p>';
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