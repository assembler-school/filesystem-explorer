<?php

function getUploadError($file, $code)
{
	$name = $file['name'];
	$type = $file['type'];

	switch ($code) {
		case 1:
			return "File $name exceeds the upload_max_filesize directive in php.ini.";
		case 2:
			return "File $name exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
		case 3:
			return "File $name was only partially uploaded.";
		case 4:
			return "No file was uploaded.";
		case 6:
			return "Missing a temporary folder.";
		case 7:
			return "Failed to write file to disk.";
		case 8:
			return "A PHP extension stopped the file upload.";
		case 9:
			return "File $name type is not allowed: $type.";
		default:
			return null;
	}
}
