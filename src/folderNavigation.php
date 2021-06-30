<?php
function getBreadcrumbs() {
    $currentPath = $_SESSION['currentPath'];
    $cleanPath = substr($currentPath, strpos($currentPath, "root"));
        $pathArr = explode("/", $cleanPath);

        foreach ($pathArr as $dir) {
          $originalPath = substr($currentPath, 0, strpos($currentPath, $dir));
          if ($originalPath . $dir == $currentPath) {
            echo "<div class='btn bg-primary text-white'>$dir</div>";
          } else {
            echo "<a href='?path={$originalPath}{$dir}'><div class='btn btn-primary me-2'>$dir</div></a>";
          }
        }
}