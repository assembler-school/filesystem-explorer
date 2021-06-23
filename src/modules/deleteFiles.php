<?php

$rootPath = "./root";

function deleteFile($rootPath)
{
    if (is_link($rootPath)) {
        return unlink($rootPath);
    } elseif (is_dir($rootPath)) {
        $objets = scandir($rootPath);
        $ok = true;
        if (is_array($objets)) {
            foreach ($objets as $j) {
                if ($j != "." && $j != "..") {
                    if (!deleteFile($rootPath . "/" . $j)) {
                        $ok = false;
                    }
                }
            }
        }
        return ($ok) ? rmdir($rootPath) : false;
    } elseif (is_file($rootPath)) {
        return unlink($rootPath);
    }

    return false;
}

// delete all files
// opcional
