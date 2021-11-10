<?php

function getFileInfo($filepath)
{
	require_once(ROOT."/utils/getFormattedSize.php");

	$name = 		basename($filepath);
	$size = 		getFormattedSize(filesize($filepath));
	$type =			pathinfo($filepath, PATHINFO_EXTENSION);
	$modtime = 	date("Y/m/d H:i:s", filemtime($filepath));
	$acctime = 	date("Y/m/d H:i:s", fileatime($filepath));

	return ["name" => $name, "size" => $size, "type" => $type, "modtime" => $modtime, "acctime" => $acctime];
}
