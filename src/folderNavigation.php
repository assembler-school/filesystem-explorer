<?php
function getBreadcrumbs()
{
    $currentPath = $_SESSION['currentPath'];
    $cleanPath = substr($currentPath, strpos($currentPath, "root"));
    $pathArr = explode("/", $cleanPath);

    array_walk($pathArr, function($folderName) use($currentPath) {
        $originalPath = substr($currentPath, 0, strpos($currentPath, $folderName));
        $folderPath = $originalPath . $folderName;
        if ($folderPath === $currentPath) {
            echo "<div class='btn bg-dark text-white'>$folderName</div>";
        } else {
            echo "<a href='index.php?path=$folderPath'><div class='btn btn-primary me-2'>$folderName</div></a>";
        }
    });
}

function goBack(){
    $newPath = $_SESSION['currentPath'] === './root' ? './root': dirname($_SESSION['currentPath']);
    return "index.php?path=$newPath";
}