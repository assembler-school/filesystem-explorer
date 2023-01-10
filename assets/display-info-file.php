<?php

$file = $_GET['filePath'];

/* if (file_exists($resultsFolder)) {
    echo "$file was created: " . date("F d Y H:i:s.", filectime($resultsFolder));

} */

$content = file_get_contents($file);
echo json_encode($content);
?>