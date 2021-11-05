<?php
	$file = $_POST['file'];
	echo $response;
	if($_POST['oldName'] !== $_POST['newName']){
		rename($file, $newName);
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