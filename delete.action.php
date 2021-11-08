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

        if (!file_exists($fullpath)) return;

        if (!is_dir($fullpath)) {
            chmod($fullpath, 0777);
            unlink($fullpath);
        } else {
            $children = scandir($fullpath);

            foreach ($children as $child) {
                if ($child === '.' || $child === '..') continue;

                $childpath = joinPath([$node, $child]);

                deleteNode($childpath);
            }

            chmod($fullpath, 0777);
            rmdir($fullpath);
        }
    }

    deleteNode($node);
    array_push($successList, "File has been deleted");
} catch (Throwable $e) {
    array_push($successList, $e->getMessage());
}

header("Location: ./index.php");
