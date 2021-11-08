<?php

// function joinPath(array $path)
// {
// 	$os = 				php_uname('s');
// 	$separator = 	$os === "Windows NT" ? '\\' : '/';
// 	$search = 		$os === "Windows NT" ? '/' : '\\';

// 	$fullpath = join($separator, $path);
// 	$fullpath = str_replace($search, $separator, $fullpath);
// 	$fullpath = preg_replace("/[\/\\\]{2,}/", $separator, $fullpath);

// 	return $fullpath;
// }

function joinPath(array $path)
{
	$separator = '/';

	$fullpath = join($separator, $path);
	$fullpath = preg_replace("/[\/\\\]{2,}/", $separator, $fullpath);

	return $fullpath;
}
