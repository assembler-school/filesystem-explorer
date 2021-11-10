<?php

function getNavLinks($urlFolderContent)
{
	$nodes = explode("/", trim($urlFolderContent, "\/\\"));
	$links = [];
	$acc = "";

	foreach ($nodes as $node) {
		$acc = implode("/", [$acc, $node]);
		array_push($links, ["name" => $node, "href" => $acc]);
	}

	return $links;
}
