<?php

function getUrlFolderPath()
{
	if (!isset($_GET["path"]) || !$_GET["path"]) return "/";

	return htmlentities(trim($_GET["path"]));
}

function getUrlSearch()
{
	if (!isset($_GET["search"])) return null;

	return htmlentities(trim($_GET["search"]));
}
