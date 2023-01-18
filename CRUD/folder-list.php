<?php

if(!isset($_SESSION)) {
    session_start();
}

$completeRoot = $_SESSION["absPath"];

$root = "root";
$complete_route = "";

    function viewFolderStructure($root) {
        if (is_dir($root)) {
            $manager = opendir($root);
            echo "<ul>";
            
            while (($file = readdir($manager)) !== false) {
                
                $complete_route = $root . "/" . $file;
                
                if ($file != "." && $file != "..") {
                    if (is_dir($complete_route)) {
                        echo "<li class='folderElements'><a href='?route=$complete_route'>" . $file . "</a></li>";
                        viewFolderStructure($complete_route);
                        
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

    if (isset($_REQUEST["route"])) {
        $completeRoot = $_REQUEST["route"];
        
    }


    function viewFolderElements($root ) {
        if (is_dir($root )) {

            $manager = opendir($root );
            echo "<ul>";

            while (($file = readdir($manager)) !== false) {
                
            $complete_route  = $root . "/" . $file ;
                if ($file != "." && $file != "..") {
                    if (is_dir($root)) {
                        echo "<li class='nameFolder'><a href='?route=$complete_route'>" . $file . "</a></li>";
                        // readfile($file);
                    } else {
                        echo "<li class='nameFolder'><a href='?route=$complete_route'>" . $file . "</a></li>";
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
