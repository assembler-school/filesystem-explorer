<?php

function deleteNode($node)
{
	require_once(ROOT . "/utils/joinPath.php");

	$fullpath = joinPath([ROOT_DIRECTORY, $node]);

	if (!file_exists($fullpath)) return;

	if (!is_dir($fullpath)) {
		chmod($fullpath, 0777);
		unlink($fullpath);
	} else {
		$children = scandir($fullpath);

		foreach ($children as $child) {
			if ($child === '.' || $child === '..') continue;

			$childpath = joinPath([$node, $child]);

			deleteNode($childpath);
		}

		chmod($fullpath, 0777);
		rmdir($fullpath);
	}
}
