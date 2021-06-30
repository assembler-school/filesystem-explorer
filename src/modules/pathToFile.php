<?php
// Required files
require_once("./modules/fileStats.php");

$pathArray = explode("/", $_SESSION["currentPath"]);
$totalPath = "";
$pathCount = 0;

echo "<p class='path-link mb-0'>";
echo "<i class='far fa-home'></i>";
echo "</p>";
echo "&nbsp;&nbsp;&#8227;&nbsp;&nbsp;";

foreach ($pathArray as $itemName) {
    // First item in single item path
    if ($pathCount == 0 && count($pathArray) == 1) {
        $totalPath = $itemName;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $totalPath . ">";
        echo $itemName;
        echo "</a>";
        $pathCount++;
    }
    // First item
    elseif ($pathCount == 0) {
        $totalPath = $itemName;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $totalPath . ">";
        echo $itemName;
        echo "</a>";
        echo "&nbsp;&nbsp;&#8227;&nbsp;&nbsp;";
        $pathCount++;
    }
    // Between items
    elseif ($pathCount < count($pathArray) - 1) {
        $totalPath = $totalPath . "/" . $itemName;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $totalPath . ">";
        echo $itemName;
        echo "</a>";
        echo "&nbsp;&nbsp;&#8227;&nbsp;&nbsp;";
        $pathCount++;
    }
    // Last item
    else {
        $totalPath = $totalPath . "/" . $itemName;
        echo "<a class='path-link' href=./modules/updatingPath.php?updatedPath=" . $totalPath . ">";
        echo $itemName;
        echo "</a>";
    }
}
