<?php

if(!isset($_SESSION)) {
    session_start();
}

$completeRoot = $_SESSION["absPath"];
// $newFolder = $_SESSION["altPath"];
// if (isset($_SESSION) && isset($_REQUEST["route"])) {
//     $newFolder = $_REQUEST["route"];
// }


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
            echo($root );
                if ($file != "." && $file != "..") {
                    if (is_dir($root)) {
                        echo "<li class='nameFolder'><a href='?route=$complete_route'>" . $file . "</a></li>";
                    
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

    // function viewFileInfo($info) {
    //         echo filesize("./root/12345123");

    //     echo "Not a valid directory path<br/>";

    // }

?>
