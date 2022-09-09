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
                        echo '<option value="../.'.$path.'/'.$files[$i].'">'.$files[$i].'</option>';
                    } else {
<<<<<<< HEAD
                        echo '<option value="(F)../.'.$path.'/'.$files[$i].'">Folder: '.$files[$i].' </option>';
=======
<<<<<<< HEAD
                        echo '<option value="(F)../.'.$path.'/'.$files[$i].'">Folder: '.$files[$i].' </option>';
=======
>>>>>>> ee5e19a2468c803f6fb5d95f940d86cdcd485d9c
>>>>>>> c4add03c8b5c7566dd24ae7abf36711bc0f25988
                        deleteOptions($path.'/'.$files[$i]);
                    }
                }
            }
        }        
    }