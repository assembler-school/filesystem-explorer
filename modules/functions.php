<?php
function loadFiles()
{
    try {
        if (isset($_GET["infolder"])) {
            $userDirs = "./root";
            $root = array_diff(scandir($userDirs), array(".", ".."));

            if (!array_key_exists($_GET["infolder"], $root)) {
                throw new Exception("FOLDER NOT FOUND");
            } else {
                $folder = $root[$_GET["infolder"]];
                $dirSelected = "./root/" . $folder;
            }


            $myFiles = array_diff(scandir($dirSelected), array(".", ".."));
            foreach ($myFiles as $element) {
                echo '<div class="col d-flex flex-column">
                    <img src="./assets/img/test.jpg" alt="photo" width="100%">
                    <div class="infoCard">
                        <img src="./assets/img/img-icon.png" alt="img-icon" width="50px">
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

