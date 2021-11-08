<?php
$dir = $_POST['path'];
print_r($dir);

//TODO: 
// take the data from $_POST, is expected to receive $_POST["path"], which is a relative path of the file or folder to delete.
// Path is relative, so you will have to join the ROOT_DIRECTORY (from config.php) with the received by POST.
// You will require to import some files with some functionalities, suchs as config.php and files inside "utils" folder.

$errorList = [];
$successList = [];

try {
    function deleteDirectory($dir)
    {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir) || is_link($dir)) return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!deleteDirectory($dir . "/" . $item)) {
                chmod($dir . "/" . $item, 0777);
                if (!deleteDirectory($dir . "/" . $item)) return false;
            };
        }
        return rmdir($dir);
    }

    array_push($successList, "File has been deleted");
} catch (Throwable $e) {
    array_push($successList, $e->getMessage());
}

// header function will redirect again to the filesystem panel once data has been processed.
header("Location: ./index.php");

// function deleteFolder($path) {
// $files = glob($path . '/*');
// foreach ($files as $file) {
//     is_dir($file) ? deleteFolder($file) : unlink($file);
// }
// rmdir($path);

// return;
// }