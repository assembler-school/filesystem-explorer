<?php
function isaFolder($archivo,$ruta){
  
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    
        // print_r($extension);
        switch ($extension) {
            case 'txt':
                echo "<li class='txt'><a href="."./index.php?root=$ruta&fileName=$archivo".">$archivo</a></li>";
                break;
                case 'img':
                    echo "<li class='img'>" . $archivo . "</li>";
                    break;
            }
    }
