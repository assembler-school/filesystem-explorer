<?php
function loadFiles()
{
    try {
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
                echo '<div class="col d-flex flex-column">
                            <img src="./assets/img/test.jpg" data-bs-toggle="modal" data-bs-target="#modalFiles" alt="photo" width="100%" style="cursor:pointer;">
                            <div class="infoCard">
                                <img src="./assets/img/img-icon.png" alt="img-icon" width="50px">
                                <p class=" fileName">' . $element . '</p>
                                <svg style="margin-left: 15px" class="trash-icon" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                            </div>
                        </div>';
            } else if (is_dir("$path/$element")) {
                echo '<div class="col d-flex flex-column folder">
                <a href="./index.php?path=' . $path . '/' . $element . '"><i class="fas fa-folder fa-5x"></i></a>
                                    <div class="infoCard">
                                        <p class=" fileName">' . $element . '</p>
                                    </div>
                                    <svg class="trash-icon2" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
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
        echo '<li class="breadcrumb-item" aria-current="page"><a href="index.php">' . "root" . '</a></li>';
    }
}

// delete all files and sub-folders from a folder


function deleteAll($dir1) {
foreach(glob($dir1 . '/*') as $file1) {
if(is_dir($file1))
deleteAll($file1);
else
unlink($file1);
}
rmdir($dir1);
}
