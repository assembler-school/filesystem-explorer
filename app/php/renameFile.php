<?php
 $fileType = strtolower(pathinfo(($_POST['filePath']), PATHINFO_EXTENSION));
$fileName = basename($_POST['filePath']);

if(file_exists($_POST['filePath'])){
	rename();
	echo $response;
} else {
	$response = false;
}

// /! Extraer el nombre de archivo completo de una ruta

// $baseName = basename('meloinvento/meloinventomucho/meloinventomuchisimo/file.jpg');

// echo $baseName;

// echo '<br/>';

// $baseNameNoExt = basename('meloinvento/meloinventomucho/meloinventomuchisimo/file.jpg', '.jpg');

// echo $baseNameNoExt;

// echo '<br/>';

// echo '<br/>';



// //! Eliminar el nombre de archivo de una ruta completa

// $path = dirname('meloinvento/meloinventomucho/meloinventomuchisimo/file.jpg');

// echo $path;

// echo '<br/>';

// echo '<br/>';