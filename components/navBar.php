<?php
if (isset($_GET["directory"])) {
    $strDirectory = $_GET["directory"];
    $arrDirectory = explode("/", $strDirectory);

    $value = "root";
    for ($i =  0; $i < count($arrDirectory); $i++) {
        if (count($arrDirectory) - 1 != $i) {
            if ($i === 0) {
                echo  "<div class='mx-2'><a href=index.php?directory=$value>$arrDirectory[$i]</a></div>";
            } else {
                $value = $value . "/" . $arrDirectory[$i];
                echo "<i class='fas fa-angle-right mt-1'></i><div class='mx-2'><a href=index.php?directory=$value>$arrDirectory[$i]</a></div>";
            }
        } else {
            echo "<i class='fas fa-angle-right mt-1'></i><div class='mx-2 breadcrumb-item active'>$arrDirectory[$i]</div>";
        }
    }
}
