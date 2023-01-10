<?php

    $ruta = "root";
  function rootFolder($ruta){

    
    if (is_dir($ruta)){
        
        $gestor = opendir($ruta);
        echo "<ul>";

        
        while (($archivo = readdir($gestor)) !== false)  {
                
            $ruta_completa = $ruta . "/" . $archivo;

            
            if ($archivo != "." && $archivo != "..") {
                
                if (is_dir($ruta_completa)) {
                    echo "<li class='folderElements'>" . $archivo . "</li>";
                    rootFolder($ruta_completa);
                } else {
                    echo "<li class='folderElements'>" . $archivo . "</li>";
                }
            }
        }

        closedir($gestor);
        echo "</ul>";
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}


?>