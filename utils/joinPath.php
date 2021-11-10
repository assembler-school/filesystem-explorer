<?php

function joinPath(array $path)
{
	$separator = '/';

	$fullpath = join($separator, $path);
	$fullpath = preg_replace("/[\/\\\]{2,}/", $separator, $fullpath);

	return $fullpath;
}
