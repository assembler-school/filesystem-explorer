<?php
function generateFoldersTreeFun($ruta,$count){
    // Se comprueba que realmente sea la ruta de un directorio
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);
        //echo "<ul>";
        // Recorre todos los elementos del directorio
        
        while (($archivo = readdir($gestor)) !== false)  {
            $count = $count + 1 ;
            $ruta_completa = $ruta . "/" . $archivo;
            // Se muestran todos los archivos y carpetas excepto "." y ".."
            if ($archivo != "." && $archivo != "..") {
                // Si es un directorio se recorre recursivamente
                if (is_dir($ruta_completa)) {
                //echo "<span class='material-icons-outlined'>folder</span>";
                //$count = $count + 1 ;
                ?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading<?=$count?>">
                        <div class="foldersTitle">
                            <span class='material-icons-outlined'>folder</span>
                            <a href="./index.php?root=<?=$ruta_completa?>"><?=$archivo?></a>
                        </div>
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?=$count?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?=$count?>">
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?=$count?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?=$count?>">
                        <div class="accordion-body">
                       <?= generateFoldersTreeFun($ruta_completa,$count); ?>
                        </div>
                    </div>
                </div>

                <?php
                //echo "<li><a href="."./index.php?root=<?=$ruta_completa? >"."><?=$archivo? > </a></li>";
                //generateFoldersTreeFun($ruta_completa);
                } else {
                    //echo "<li>" . $archivo . "</li>";
                }
            }
        }
        // Cierra el gestor de directorios
        closedir($gestor);
        echo "</ul>";
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}