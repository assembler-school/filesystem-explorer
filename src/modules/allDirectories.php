<?php
// session_start();

$dirsInside = array_filter(glob($_SESSION["currentPath"] . "/*"), "is_dir");
$_SESSION["currentDirectories"] = [];

$parentDirRaw = $_SESSION["currentPath"];
$explodedDirRaw = explode("/", $parentDirRaw);
$currentDir = $explodedDirRaw[count($explodedDirRaw) - 1];

// Parent folder link if is no before "root"
if (count($explodedDirRaw) > 1) {
    $parentDir = $explodedDirRaw[count($explodedDirRaw) - 2];
    echo "<a class='dir dir-link' href=./modules/updatingPath.php?updatedPath=" . dirname($_SESSION["currentPath"],  1) . ">";
    echo $parentDir;
    echo "</a>";
} else {
    echo "<p class='dir mb-0'>";
    echo "<i class='far fa-home'></i>";
    // echo "~";
    echo "</p>";
}

// Current folder
echo "<p class='dir current-dir'>";
echo "&#8627; " . $currentDir;
echo "</p>";

// Creating a folder link to navigate
if ($dirsInside) {
    foreach ($dirsInside as $dir) {
        $dirExploded = explode("/", $dir);
        $dirName = end($dirExploded);

        // Creating array with folder names
        array_push($_SESSION["currentDirectories"], $dirName);

        // Directory link
        echo "<a class='dir dir-link dir-child' href=./modules/updatingPath.php?updatedPath=" . $_SESSION["currentPath"] . "/" . $dirName . ">";
        echo "&#8627; " . $dirName;
        echo "</a>";
    };
}
