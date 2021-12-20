<?php
function loadFiles()
{
    try {
        $userDirs = "./root";
        $root = getarrayDiff($userDirs);
        //IF WE ARE IN OTHER FOLDER
        if (isset($_GET["infolder"])) {

            if (!array_key_exists($_GET["infolder"], $root)) {
                throw new Exception("FOLDER NOT FOUND");
            } else {
                $folder = $root[$_GET["infolder"]];
                $dirSelected = "./root/" . $folder;
            }
            //IF WE ARE IN INDEX.PHP
            echo empty($_GET);
        } else if (empty($_GET)) {
            $dirSelected = "./root";
        }
        $myFiles = getarrayDiff($dirSelected);
        foreach ($myFiles as $key => $element) {
            if (is_file("$dirSelected/$element")) {
                echo '<div class="col d-flex flex-column">
                        <img src="./assets/img/test.jpg" alt="photo" width="100%">
                        <div class="infoCard">
                           <img src="./assets/img/img-icon.png" alt="img-icon" width="50px">
                            <p class=" fileName">' . $element . '</p>
                        </div>
                    </div>';
            } else if (is_dir("$dirSelected/$element")) {
                echo '<div class="col d-flex flex-column">
                    <a href="./index.php?infolder=' . $key . '"><i class="fas fa-folder fa-5x"></i></a>
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

function getarrayDiff($dir)
{
    return array_diff(scandir($dir), array(".", ".."));
}
