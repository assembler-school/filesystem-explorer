<?php
require("./path_manager.php");

$baseFolderPath = removeLastDirectoryPath($_POST["folderPath"]);

rename($_POST["folderPath"], ($baseFolderPath . $_POST["newFolderName"]));

header("Location:./../../index.php");
