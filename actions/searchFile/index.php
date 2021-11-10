<?php

session_start();

require_once("../../config.php");
require_once(ROOT . "/modules/validation.php");
require_once(ROOT . "/modules/session.php");
require_once(ROOT . "/utils/joinPath.php");
require_once(ROOT . "/utils/searchInDrive.php");

// look for the input given by forM GET and search in the whole drive folder with scandir

$_SESSION["search"]= $_GET ["search"];
searchItem();

header ("Location: ../../index.php") ;
