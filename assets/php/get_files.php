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
                        echo '<li>'. $files[$i] . '</li>';
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
                                $ext = substr($files[$i], -3);
                                echo '<a class="file-link" target="_blank" href="'.$path.'/'.$files[$i].'"><div class="found-file">';
                                echo '<img src="./assets/img/'.$ext.'.png" alt="'.$ext.' logo" width="60px">';
                                echo '<span>'.$files[$i].'</span>'; 
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