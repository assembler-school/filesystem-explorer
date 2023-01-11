<?php

$dirToDelete = $_GET['path'];

$dirToDelete;

 if(is_dir(".$dirToDelete")){
    rrmdir(".$dirToDelete");
} else{
     echo 'not a dir';
 }

 
 function rrmdir($dir) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
        }
      }
      reset($objects);
      rmdir($dir);
      echo json_encode(["ok"=>true]);
    } 
  }
