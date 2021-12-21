<?php
function loadFiles()
{
    try {
        //IF WE ARE IN OTHER FOLDER
        echo print_r($_GET);
        if (isset($_GET["path"])) {
            $path = $_GET["path"];
            echo $path;
            //IF WE ARE IN INDEX.PHP

        } else if (empty($_GET)) {
            $path = "./root";
        }
        $myFiles = getarrayDiff($path);
        echo print_r($myFiles);
        foreach ($myFiles as $key => $element) {
            if (is_file("$path/$element")) {
                echo '<div class="col d-flex flex-column">
                            <img src="./assets/img/test.jpg" alt="photo" width="100%">
                            <div class="infoCard">
                               <img src="./assets/img/img-icon.png" alt="img-icon" width="50px">
                                <p class=" fileName">' . $element . '</p>
                            </div>
                        </div>';
            } else if (is_dir("$path/$element")) {
                echo '<div class="col d-flex flex-column">
                        <a href="./index.php?path=' . $path . '/' . $element . '"><i class="fas fa-folder fa-5x"></i></a>
                                    <div class="infoCard">
                                        <p class=" fileName">' . $element . '</p>
                                    </div>
                                </div>';
            }
        }
    } catch (Exception $t) {
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
            echo '<a href="index.php?infolder=' . $key . '" class="sub-item"><i class="fas fa-folder"></i>' . $element . '</a>';
        }
    }
}
function getarrayDiff($dir)
{
    return array_diff(scandir($dir), array(".", ".."));
}
function breadcrumb($path)
{
    $arrParameters = explode("/", $path);
    foreach ($arrParameters as $key => $element) {
        if ($key == 1) {
            echo '<li class="breadcrumb-item" aria-current="page"><a href="index.php">' . $element . '</a></li>';
        }
        if ($key > 1) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . $element . '</li>';
        }
    }
}
