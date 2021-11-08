<?php

function getUploadedFiles($files_post)
{
	$files = [];
	$file_count = count($files_post['name']);
	$file_keys = array_keys($files_post);

	for ($i = 0; $i < $file_count; $i++) {
		foreach ($file_keys as $key) {
			$files[$i][$key] = $files_post[$key][$i];
		}
	}

	return $files;
}
