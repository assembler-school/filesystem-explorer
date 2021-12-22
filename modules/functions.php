<?php
require_once("extensions.php");
function loadFiles()
{
    try {
        global $extensions;
        //IF WE ARE IN OTHER FOLDER
        if (isset($_GET["path"])) {
            $path = $_GET["path"];
            //IF WE ARE IN INDEX.PHP

        } else if (empty($_GET)) {
            $path = "./root";
        }
        $myFiles = getarrayDiff($path);
        foreach ($myFiles as $key => $element) {
            if (is_file("$path/$element")) {
                $format = pathinfo("$path/$element");
                $icon = $extensions[$format["extension"]];
                echo '<div class="gridMain">
                            <a href="index.php?path=' . $path .'&visualize=' . $element . '">
                            <img src="' . $icon . '" alt="photo" width="100%" style="cursor:pointer;">
                            </a>
                            <div class="infoCard">
                                <p class=" fileName">' . $element . '</p>
                            </div>
                            <div id="nextTo">
                                        <svg class="trash-icon2" class="btn btn-primary" data-bs-toggle="modal" data-url="' . $path . "/" . $element . '" data-bs-target="#deleteModal" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="cursor:pointer;">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" data-bs-target="#modalEdit" id="' . $element . '" class="renameBtn" data-bs-toggle="modal" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="cursor:pointer;"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </div>
                        </div>';
            } else if (is_dir("$path/$element")) {
                echo '<div class="col d-flex flex-column folder">
                        <a href="./index.php?path=' . $path . '/' . $element . '"><i class="fas fa-folder fa-5x"></i></a>
                                    <div class="infoCard">
                                        <p class=" fileName">' . $element . '</p>
                                    </div>
                                    <div id="nextTo">
                                        <svg class="trash-icon2" class="btn btn-primary" data-bs-toggle="modal" data-url="' . $path . "/" . $element . '" data-bs-target="#deleteModal" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="cursor:pointer;">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" data-bs-target="#modalEdit" id="' . $element . '" class="renameBtn" data-bs-toggle="modal" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="cursor:pointer;"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </div>
                                </div>';
            }
        }
    } catch (Throwable $t) {
        echo "FOLDER NOT FOUND";
        $t->getMessage();
    }
}

function folderSideBar()
{
    $my_dir = "./root";

    $folders = getarrayDiff($my_dir);
    foreach ($folders as $key => $element) {
        if (is_dir("$my_dir/$element")) {
            echo '<a href="index.php?path=' . $my_dir . '/' . $element . '" class="sub-item"><i class="fas fa-folder"></i>' . $element . '<svg class="trash-icon" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg></a>';
        }
    }
}
function getarrayDiff($dir)
{
    return array_diff(scandir($dir), array(".", ".."));
}
function breadcrumb($path)
{
    if ($path) {
        $arrParameters = explode("/", $path);
        $numParameters = count($arrParameters);
        $getUrl = array();
        foreach ($arrParameters as $key => $element) {
            if ($key == 1) {
                echo '<li class="breadcrumb-item" aria-current="page"><a href="index.php">' . $element . '</a></li>';
            } else if ($key > 1 && $key != $numParameters - 1) {
                //GET HREF CORRECTLY IN ORDER
                if ($key === 2) {
                    //FIRST ITERATION
                    $getUrl[$key] = "./root/$element";
                } else {
                    //NEXTS ITERATIONS
                    $getUrl[$key] = $getUrl[$key - 1] . '/' . $element;
                }
                echo '<li class="breadcrumb-item" aria-current="page"><a href="index.php?path=' . $getUrl[$key] . '">' . $element . '</a></li>';
            } else if ($key === $numParameters - 1) {
                echo '<li class="breadcrumb-item active" aria-current="page">' . $element . '</li>';
            }
        }
    } else {
        echo '<li class="breadcrumb-item" aria-current="page"><a href="index.php">' . "Main" . '</a></li>';
    }
}

function visualazing() {
    if (!isset($_GET["path"])) {
        return "./root/";
    } else {
        return $_GET["path"] .'/';
    }
}


// delete all files and sub-folders from a folder



// $nombre_archivo = 'archivo.txt';
// if (file_exists($nombre_archivo)) {
//     echo "La última modificación de $nombre_archivo fue: " . date("F d Y H:i:s.", filectime($nombre_archivo));
// }
// echo "La fecha de modificación del fichero 001-ejemplo-php-filemtime.php es '" . date ("F d Y H:i:s.", filemtime("001-ejemplo-php-filemtime.php")) . "'";
