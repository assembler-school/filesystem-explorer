<?php


session_start();
// function renameFiles2()
// {
//     if ($handle = opendir("./root")) {
//         while (false !== ($file = readdir($handle))) {
//             $newName = str_replace(".", "", $file);
//             rename($file, $newName);
//         }
//     }

//     closedir($handle);
// }




// function renameFiles($target_dir, $search, $replace)
// {
//     $pathNames = glob($target_dir);

//     foreach ($pathNames as $pathName) {
//         if (!is_file($pathName)) {
//             continue;
//         }

//         $dirName = dirname($pathName);
//         $fileName = basename($pathName);

//         $newPathName = $dirName . "/" . str_replace($search, $replace, $fileName);

//         if (file_exists($newPathName)) {
//             throw new exception("the file " . $newPathName . " already exists");
//         }

//         // rename(old, new)
//         rename($pathName, $newPathName);
//     }
// }





function downloadFile()
{
    $pathToDownload = $_GET["download"];

    $path_file_dw =  dirname(getcwd()) . "/root/" . $pathToDownload;

    if (file_exists($path_file_dw)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($path_file_dw) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path_file_dw));
        ob_clean();
        flush();
        readfile($path_file_dw);
        exit;
    }
}

header("Location: ../index.php");
