<?php

require_once("./modules/fileStats.php");


$pathArray = explode("/", $_SESSION["currentPath"]);
$itemPath = "";
$pathCount = 0;

echo "<p class='path-link mb-0'>";
// echo "~";
echo "<i class='far fa-home'></i>";
echo "</p>";
echo "&nbsp;&nbsp;&#8227;&nbsp;&nbsp;";


foreach ($pathArray as $pathItem) {
    if ($pathCount < count($pathArray) - 1) {
        $itemPath = $itemPath . $pathItem;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $itemPath . ">";
        echo $pathItem;
        echo "</a>";
        echo "&nbsp;&nbsp;&#8227;&nbsp;&nbsp;";
        $pathCount++;
    } else {
        $itemPath = $itemPath . $pathItem;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $itemPath . ">";
        echo $pathItem;
        echo "</a>";
    }
}
