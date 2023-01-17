<?php
$dataPathSecond = $_REQUEST['dataPathSecond'];
$files = "../trash/".$dataPathSecond;
delete_folder($files);
function delete_folder($dir){
    if(is_dir($dir)){
        $objects = scandir($dir);
        foreach ($objects as $object){
            if ($object != "." && $object != ".."){
                if(filetype($dir."/".$object)=="dir"){
                    delete_folder($dir."/".$object);
                } else{
                    unlink($dir."/".$object);
                }
            }
        }
        reset($objects);
        rmdir($dir);
        echo json_encode(["ok"=>true]);
    } else {
        unlink($dir);
        echo json_encode(["ok"=>true]);
    }
    
}

// foreach ($files as $file) {
//     if(is_file(($file))){
//         unlink($file);
//     }
// } 