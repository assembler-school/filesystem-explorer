<?php
function search(){
    
    foreach (glob("root/*/h*") as $nombre_fichero) {
        echo $nombre_fichero;
    }

    foreach (glob("root/h*") as $nombre_fichero) {
        echo $nombre_fichero;
    }

}

search();