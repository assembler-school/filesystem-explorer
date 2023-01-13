<?php

$root = "root";

  function viewElements($root){
    if (is_dir($root)){
        $manager = opendir($root);
        echo "<ul>";
        
        while (($file = readdir($manager)) !== false)  {
            
            $complete_route = $root . "/" . $file;

            if ($file != "." && $file != "..") {
                if (is_dir($complete_route)) {
                    echo "<li class='folderElements'><a href='?route=$complete_route'>" . $file . "</a></li>";
                     viewElements($complete_route);
                } else {
                    echo "<li class='folderElements'><a href='?route=$complete_route'>" . $file . "</a></li>";
                }
            }
        }

        closedir($manager);
        echo "</ul>";
    } else {
        echo "Not a valid directory path<br/>";
    }
}

?>