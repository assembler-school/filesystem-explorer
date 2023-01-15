<?php

$root = "./root";
$file = "";


    function viewFolderStructure($root)
    {
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

    if (isset($_SESSION) && isset($_REQUEST["route"])) {
        $completeRoot = $_REQUEST["route"];
        
    }


    function viewFolderElements($completeRoot) {
        if (is_dir($completeRoot)) {
            $manager = opendir($completeRoot);
            echo "<ul>";

            while (($file = readdir($manager)) !== false) {

                $completeRoot = $completeRoot . "/" . $file;

                if ($file != "." && $file != "..") {
                    if (is_dir($completeRoot)) {
                        echo "<li class='folderElements'><a href='?route=$file'>" . $file . "</a></li>";
                        viewFolderElements($completeRoot);
                    } else {
                        echo "<li class='folderElements'><a href='?route=$file'>" . $file . "</a></li>";
                    var_dump("root/" . $file);
                    }
                    if (is_dir("./root/" . $file)) {
                        if ($dh = opendir($file)) {
                            while (($file = readdir($dh)) !== false) {
                                echo "filename: .".$file."<br />";
                            }
                            closedir($dh);
                        }
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