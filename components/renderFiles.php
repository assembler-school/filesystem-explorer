<?php

function readDirectory($search, $folderPath)
{
    if (is_dir($folderPath)) {
        if ($dh = opendir($folderPath)) {
            while (($found = readdir($dh)) !== false) {
                if ($found === "." || $found === "..") {
                } else {
                    if (str_contains($found, $search)) {
                        printDirectory($folderPath . '/' . $found);
                    }
                    if (filetype($folderPath) == "dir") {
                        readDirectory($search, $folderPath . '/' . $found);
                    }
                }
            }
        }
        closedir($dh);
    }
}

function printDirectory($fullPath)
{
    $modificationDate = date("d/m/Y H:i", filemtime($fullPath));
    $creationDate = date("d/m/Y H:i", filectime($fullPath));
    $fileSize = round(filesize($fullPath), 2) < 1000000 ? round(filesize($fullPath) /  1000, 2) . " KB" : round(filesize($fullPath) /  1000000, 2). " MB";
    $ext = strtoupper(pathinfo($fullPath, PATHINFO_EXTENSION));
    $fileName = explode("/", $fullPath)[count(explode("/", $fullPath)) - 1];
    // $test = printFileType($ext);

    if (is_dir($fullPath)) {
        if (PHP_OS == "WINNT") {
            echo "
                <div class='row align-items-center'>
                    <a class='col-3 d-flex align-items-center text-truncate' href=index.php?directory=$fullPath>
                    <img src=./assets/icons/folder.svg>
                    <p class='ml-2'>$fileName</p>
                    </a>
                    <p class='col'>$creationDate</p>
                    <p class='col'>$modificationDate</p>
                    <p class='col-1'>Folder</p>
                    <p class='col-2'></p>
                    <a class='col-1' href='components/erase.php?erase=$fullPath'><button class='btn btn-danger p-0'><i class='fas fa-trash-alt'></i></button></a>
                </div>
                <hr>";
        } else {
            echo "
                <div class='row align-items-center'>
                <a class='col-3 d-flex align-items-center text-truncate' href=index.php?directory=$fullPath>
                    <img src=./assets/icons/folder.svg>
                    <p class='ml-2'>$fileName</p>
                    </a>
                    <p class='col'>Unknown</p>
                    <p class='col'>$modificationDate</p>
                    <p class='col-2'></p>    
                </div>
                <hr>";
        }
    } else {
        if (PHP_OS == "WINNT") {
            echo "
                    <div class='row align-items-center'>
                        <a class='col-3 d-flex align-items-center text-truncate' href=$fullPath><img src=./assets/icons/$ext-icon.svg><p>$fileName</p></a>
                        <p class='col'>$creationDate</p>
                        <p class='col'>$modificationDate</p>
                        <p class='col-1'>$ext</p>
                        <p class='col-2'>$fileSize</p>
                        <a class='col-1' href='components/erase.php?erase=$fullPath'><button class='btn btn-danger p-0'><i class='fas fa-trash-alt'></i></button></a>
                    </div>
                <hr>";
        } else {
            echo "
                    <div class='row align-items-center'>
                        <a class='col-3 d-flex align-items-center text-truncate' href=$fullPath><img src=./assets/icons/$ext-icon.svg>$fileName</a>
                        <p class='col' >Unknown</p>
                        <p class='col' >$modificationDate</p>
                        <p class='col-1' >$ext</p>
                        <p class='col-2' >$fileSize</p>
                    </div>
                <hr>";
        }
    }
}

if (!isset($_GET["search"])) {
    if (isset($_GET["directory"]) && explode("/", $_GET["directory"])[0] == "root" && !str_contains($_GET["directory"], "..")) {
        $directory =  $_GET["directory"];
    } else {
        $directory = 'root';
    }
    scandir($directory, SCANDIR_SORT_ASCENDING);
    if (is_dir($directory)) {
        if ($dh = opendir($directory)) {
            while (($file = readdir($dh)) !== false) {
                if ($file === "." || $file === "..") {
                } else {
                    $fullPath = "$directory/$file";
                    printDirectory($fullPath);
                }
            }
            closedir($dh);
        }
    }
} else {
    $search = $_GET["search"];
    $folderPath = "root";
    readDirectory($search, $folderPath);
}

// function printFileType($ext)
// {
//     switch ($ext) {
//         case "doc":
//             return "<img src='$ext-icon'>";
//             break;
//         case "csv":
//             return "<img src='$ext-icon'>";
//             break;
//         case "jpg":
//             return "<img src='$ext-icon'>";
//             break;
//         case "png":
//             return "<img src='$ext-icon'>";
//             break;
//         case "txt":
//             return "<img src='$ext-icon'>";
//             break;
//         case "ppt":
//             return "<img src='$ext-icon'>";
//             break;
//         case "odt":
//             return "<img src='$ext-icon'>";
//             break;
//         case "pdf":
//             return "<img src='$ext-icon'>";
//             break;
//         case "zip":
//             return "<img src='$ext-icon'>";
//             break;
//         case "rar":
//             return "<img src='$ext-icon'>";
//             break;
//         case "exe":
//             return "<img src='$ext-icon'>";
//             break;
//         case "svg":
//             return "<img src='$ext-icon'>";
//             break;
//         case "mp3":
//             return "<img src='$ext-icon'>";
//             break;
//         case "mp4":
//             return "<img src='$ext-icon'>";
//             break;
//         default:
//             return "";
//             break;
//     }
// }
