<?php
	$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
	$file = '/'.$_POST['file'];
	$path = dirname($file);

	$newName = $_POST['newName'];
	$newPath = $path.'/'. $newName;

	if($_POST['oldName'] !== $_POST['newName']){
		rename('/Applications/XAMPP/xamppfiles/htdocs/dashboard/ASSEMBLER/filesystem-explorer/storage/descarga.jpeg', '/Applications/XAMPP/xamppfiles/htdocs/dashboard/ASSEMBLER/filesystem-explorer/storage/descarga2.jpeg');
		echo $response;
	} else {
		$response = false;
	}


	$uri = $_SERVER['REQUEST_URI'];
	$uri = explode('/', $uri);
// echo $uri;
// if (isset($uri) && $uri !== null) {
// 	$uri = substr($uri, 1);
// 	$uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
// } else {
// 	$uri = null;
// }

define("BASE_URL", $uri);
print_r($uri);
echo $rootDir ;

echo $file;