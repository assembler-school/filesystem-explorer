<?php

function printBreadCrumbs()

{
    include('./config.php');
    session_start();

    if (!isset($_SESSION[$currentPath])) {
        $_SESSION[$currentPath] = $rootPath;

        echo "<div class='bread-crumbs-container'>";
        echo '<p>./root</p>';
        echo "</div>";
    } else {
        $breadCrumbs = explode("/", $_SESSION['curr_path']);
        $initialRoute = '';

        echo "<div class='bread-crumbs-container'>";
        foreach ($breadCrumbs as $path) {
            $initialRoute = $initialRoute . $path . "/";
            echo "<a onclick=(navigateToFolder(event)) path='$initialRoute'>$path</a>";
        }
        echo "</div>";
    }
}
