<?php
if(!isset($_SESSION)){
    session_start();
}

function viewElements($root){
  if (is_dir($root)){
      $directory="assets/icons/";
      $dirint = dir($directory);
      $manager = opendir($root);
    //   echo "<ul>";
      
      while (($file = readdir($manager)) !== false)  {
          
          $complete_route = $root . "/" . $file;

          if ($file != "." && $file != "..") {
              if (is_dir($complete_route)) {
                $image = $directory. 'folder.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
              } else {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if ($extension == 'jpg') {
                    $image = $directory. 'jpg.png';
                    echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            } elseif ($extension == 'png') {
                    $image = $directory. 'png.png';
                    echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'doc') {
                    $image = $directory. 'doc.png';
                    echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'csv') {
                $image = $directory. 'csv.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'exe') {
                $image = $directory. 'exe.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'mp3') {
                $image = $directory. 'mp3.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'mp4') {
                $image = $directory. 'mp4.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'odt') {
                $image = $directory. 'odt.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'pdf') {
                $image = $directory. 'pdf.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'png') {
                $image = $directory. 'png.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'ppt') {
                $image = $directory. 'ppt.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'rar') {
                $image = $directory. 'rar.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'svg') {
                $image = $directory. 'svg.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'txt') {
                $image = $directory. 'txt.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }elseif ($extension == 'zip') {
                $image = $directory. 'zip.png';
                echo "<div class ='col-md-3 mb-5 icon-content'><a href='?route=$complete_route'><img src='$image'><br>" . $file . "</a></div>";
            }
              }
          }
      }

      closedir($manager);
    //   echo "</ul>";
  } else {
      echo "Not a valid directory path<br/>";
  }
}



?>