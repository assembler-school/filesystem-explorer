<?php

require_once("./config.php");
require_once("./modules/validation.php");
require_once("./modules/session.php");
require_once("./utils/joinPath.php");

$node = $_POST['path'];


//TODO: 
// take the data from $_POST, is expected to receive $_POST["path"], which is a relative path of the file or folder to delete.
// Path is relative, so you will have to join the ROOT_DIRECTORY (from config.php) with the received by POST.
// You will require to import some files with some functionalities, suchs as config.php and files inside "utils" folder.

$errorList = [];
$successList = [];

try {
    function deleteNode($node)
    {
        $fullpath = joinPath([ROOT_DIRECTORY, $node]);

        var_dump(($fullpath));
        var_dump(file_exists($fullpath));
        if (!file_exists($fullpath)) return true;
        if (!is_dir($fullpath) || is_link($fullpath)) return unlink($fullpath);

        foreach (scandir($fullpath) as $item) {
            echo "<pre>";
            echo $item;
            echo "</pre>";
            // if ($item == '.' || $item == '..') continue;
            // if (!deleteNode($node . "/" . $item)) {
            //     chmod($node . "/" . $item, 0777);
            //     if (!deleteNode($node . "/" . $item)) return false;
            // };
        }
        return rmdir($node);
    }
    deleteNode($node);
    array_push($successList, "File has been deleted");
} catch (Throwable $e) {
    array_push($successList, $e->getMessage());
}

// header function will redirect again to the filesystem panel once data has been processed.
// header("Location: ./index.php");
