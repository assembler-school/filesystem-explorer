<?php
$nombreActual = $_GET["filePath"];

function deleteFolder($dirPath){

$files = glob($dirPath . '/*');
foreach ($files as $file) {
    if (is_dir($file)) {
        deleteDir($file);
    } else {
        unlink($file);
    }
}

rmdir($dirPath);
}

deleteFolder('../root/'.$nombreActual);

?>