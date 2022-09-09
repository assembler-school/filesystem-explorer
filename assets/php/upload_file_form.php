<?php 
    function createOptions($path) {
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
                        echo '<option value="../.'.$path.'/'.$files[$i].'/">'.$files[$i].'</option>';
                        createOptions($path.'/'.$files[$i]);
                    }
                }
            }
        }        
    }

