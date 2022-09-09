<?php
    function deleteOptions($path) {
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
                        echo '<option value="../.'.$path.'/'.$files[$i].'">-- '.$files[$i].'</option>';
                    } else {
                        echo '<option class="folder-option" value="(F)../.'.$path.'/'.$files[$i].'">Folder: '.$files[$i].' </option>';
                        deleteOptions($path.'/'.$files[$i]);
                    }
                }
            }
        }        
    }