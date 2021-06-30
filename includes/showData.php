<?php

//echo $prueba=$_POST['prueba'];

//echo "Videos";

$ruta = "../root";
function listar_directorios_ruta($ruta){
  // abrir un directorio y listarlo recursivo
  if (is_dir($ruta)) {
     if ($dh = opendir($ruta)) {
        while (($file = readdir($dh)) !== false) {
           //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
           //mostraría tanto archivos como directorios
           echo "$file " ;
           if (is_dir($ruta . $file) && $file!="." && $file!=".."){
              //solo si el archivo es un directorio, distinto que "." y ".."
              print_r("<br>entro 2");
              echo "<br>Directorio: $ruta$file";
              listar_directorios_ruta($ruta . $file . "/");
           }
        }
     closedir($dh);
     }
  }else
     echo "<br>No es ruta valida";
}
listar_directorios_ruta($ruta);