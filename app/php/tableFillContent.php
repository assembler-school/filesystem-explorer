<?php
include "fileBrowser.php";
include "getFileSize.php";

foreach (fileBrowser() as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) !== "") {

        $fileName =  basename($file);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileCreate =  date("Y-m-d H:m:s", fileatime($file));
        $fileModify =  date("Y-m-d H:m:s", filemtime($file));

        echo ' <tr>' .
            ' <td> ' . $fileName . ' </td> ' .
            ' <td> ' . $fileType . ' </td>' .
            ' <td> ' . $fileCreate . ' </td>' .
            ' <td> ' . $fileModify . ' </td>' .
            ' <td> ' . getFileSize($file) . ' </td>' .
            ' <td> ' . 'ACTIONS' . ' </td>' .
            '</tr> ';
    }
}
