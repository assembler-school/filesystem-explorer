<?php
$file = $_FILES['file'];
$files = glob('my_folder/*'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino el fichero
}