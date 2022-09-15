<?php

$thisEntry = "ROOT";

function dirList($path){

if ($fh = opendir($path)){
    while(($entry = readdir($fh)) !== false) {
        $thisEntry=$path . DIRECTORY_SEPARATOR . $entry;
        if ($entry != "." && $entry != ".." && is_dir($thisEntry)==true){
            
                 echo "<li><a href='index.php?name=$thisEntry' class='link-dark d-inline-flex text-decoration-none rounded'> $entry</a></li>";
                
           
        }
    }
    }

}




/*
   
if ($fh = opendir($path)){
    while(($entry = readdir($fh)) !== false) {
        $thisEntry=$path . DIRECTORY_SEPARATOR . $entry;
        if ($entry != "." && $entry != ".." && is_dir($thisEntry)==true){
          
                 echo "<li><a href='index.php?name=$thisEntry' class='link-dark d-inline-flex text-decoration-none rounded'> $entry</a></li>";
                
           
        }
    }
}

}
?>





*/

?>
