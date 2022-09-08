<?php
    function getFolders($path) {
        echo '<ul>';
        if(is_dir($path)) {
            if ($handle = opendir($path)) {
                $files = [];
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry !="..") {
                        array_push($files, $entry);
                    }
                }
                for ($i = 0; $i < count($files); $i++) {
                    if(is_dir($path.'/'.$files[$i])) {
                        echo '<li>'. $files[$i] . '</li>';
                    }
                    getFolders($path.'/'.$files[$i]);
                }
                
            }
        }
        echo '</ul>';
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
                    if(!is_dir($path.'/'.$files[$i])) {
                        echo '<h2 class="files-path">'. $path. '/</h2>';
                        $ext = substr($files[$i], -3);
                        echo '<div class="found-files">';
                        echo '<img src="./assets/img/'.$ext.'.png" alt="'.$ext.' logo" width="50px">';
                        echo '<span>'.$files[$i].'</span>'; 
                        echo '</div>';
                        echo '<hr>';
                    }
                    if(is_dir($path.'/'.$files[$i])) {
                        getFiles($path.'/'.$files[$i]);
                    }
                }
                
            }
        }
    }