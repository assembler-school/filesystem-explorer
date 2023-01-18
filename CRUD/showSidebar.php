<?php
if(!isset($_SESSION)){
    session_start();
}
$root= 'root';

  function viewFolderStructure($root){
      if (is_dir($root)){
        $directory="assets/icons/";
        $dirint = dir($directory);
        $manager = opendir($root);
        echo "<ul class='list-nav show'>";
        
        while (($file = readdir($manager)) !== false)  {

            $complete_route = $root . "/" . $file;

            if ($file != "." && $file != "..") {
                if (is_dir($complete_route)) {
                    $image = $directory. 'folder.png';
                    echo "<li><a href='?route=$complete_route' class='link-list'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    viewFolderStructure($complete_route);
                } else {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    if ($extension == 'jpg') {
                            $image = $directory. 'jpg.png';
                            echo "<li><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    } elseif ($extension == 'png') {
                            $image = $directory. 'png.png';
                            echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'doc') {
                            $image = $directory. 'doc.png';
                            echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'csv') {
                        $image = $directory. 'csv.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'exe') {
                        $image = $directory. 'exe.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'mp3') {
                        $image = $directory. 'mp3.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'mp4') {
                        $image = $directory. 'mp4.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'odt') {
                        $image = $directory. 'odt.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'pdf') {
                        $image = $directory. 'pdf.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'png') {
                        $image = $directory. 'png.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'ppt') {
                        $image = $directory. 'ppt.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'rar') {
                        $image = $directory. 'rar.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'svg') {
                        $image = $directory. 'svg.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'txt') {
                        $image = $directory. 'txt.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
                    }elseif ($extension == 'zip') {
                        $image = $directory. 'zip.png';
                        echo "<li class='file-sidebar'><a href='?route=$complete_route' class='link-list' data='rename'><img src='$image' style='width:25px;'>" . $file . "</a></li>";
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