<?php
function getBreadcrumbs()
{
    $currentPath = $_SESSION['currentPath'];
    $cleanPath = substr($currentPath, strpos($currentPath, "root"));
    $pathArr = explode("/", $cleanPath);

    array_walk($pathArr, function ($folderName) use ($currentPath) {
        $originalPath = substr($currentPath, 0, strpos($currentPath, $folderName));
        $shortFolderName = strlen($folderName) > 16 ? substr($folderName, 0, 13) . '...' : $folderName;
        $folderPath = $originalPath . $folderName;
        if ($folderPath === $currentPath) {
            echo "<div class='btn bg-dark text-white' title='$folderName' style='cursor:default'>$shortFolderName</div>";
        } else {
            echo "<a href='index.php?path=$folderPath'><div class='btn btn-primary me-2' title='$folderName'>$shortFolderName</div></a>";
        }
    });
}

function goBack()
{
    $newPath = $_SESSION['currentPath'] === './root' ? './root' : dirname($_SESSION['currentPath']);
    return "index.php?path=$newPath";
}

function goRoot()
{
    echo './index.php?path=./root';
}
