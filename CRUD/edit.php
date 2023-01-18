<?php
$absPath = $_SESSION["absPath"];
if (isset($_POST["btn-edit"])) {
    $newNameFolder = $_POST["edit"];
    rename($absPath, "root/" . $newNameFolder);
}
echo $absPath;
?>

