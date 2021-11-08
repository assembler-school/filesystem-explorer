<?php

function getFolderContent($urlFolderPath)
{
	require_once(ROOT . "/utils/joinPath.php");
	require_once(ROOT . "/utils/getFileInfo.php");

	$content = ["files" => [], "folders" => []];
	$folderPathFull = joinPath([ROOT_DIRECTORY, $urlFolderPath]);

	try {
		$fileNames = scandir($folderPathFull, SCANDIR_SORT_ASCENDING);

		foreach ($fileNames as $fileName) {
			if (in_array($fileName, [".", ".."])) continue;

			$urlPath = 	joinPath([$urlFolderPath, $fileName]);
			$filePath = joinPath([$folderPathFull, $fileName]);
			$info =	getFileInfo($filePath);

			$list = is_dir($filePath) ? "folders" : "files";

			array_push(
				$content[$list],
				[
					"path" => $urlPath,
					"name" => $info["name"],
					"size" => $info["size"],
					"type" => $info["type"],
					"modtime" => $info["modtime"],
					"acctime" => $info["acctime"],
				]
			);
		}

		if ($urlFolderPath !== "/") {
			$parentpath = preg_replace("/\/[^\/:*?\"<>|]*$/", "", $urlFolderPath);

			array_push($content["folders"], [
				"path" => $parentpath ? $parentpath : "/",
				"name" => "..",
				"type" => "",
				"size" => "",
				"modtime" => "",
				"acctime" => ""
			]);
		}

		return $content;
	} catch (Throwable $e) {
		var_dump($e->getMessage());
		return null;
	}
}
