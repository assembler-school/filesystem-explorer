<?php
// session_start();
require_once("./modules/file-icon.php");

if (isset($_POST["search"])) {
    $searchValue = $_POST["search"];
}

// function getDirContents($dir, &$results = array())
// {
//     $files = scandir($dir);
//     foreach ($files as $key => $value) {
//         $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
//         if (!is_dir($path)) {
//             $results[] = ['name' => $value, 'size' => filesize($path), "modified" => date("m/d/Y H:i", filemtime($path)), "created" => date("m/d/Y H:i", filectime($path)),];
//         } else if ($value != "." && $value != "..") {
//             getDirContents($path, $results);
//             $results[] = ['name' => $value, "modified" => date("m/d/Y H:i", filemtime($path)), "created" => date("m/d/Y H:i", filectime($path))];
//         }
//     }
//     return $results;
// }

function convert_filesize($bytes, $decimals = 2)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

$path = "./root";
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path)
);

$searchedFiles = [];
foreach ($iterator as $fileInfo) {
    if ($fileInfo->isFile()) {
        $searchedFiles[] = [
            $fileInfo->getFilename(),
            dirname($fileInfo->getPathname()),
            convert_filesize(filesize($fileInfo)),
            date("m/d/Y H:i", $fileInfo->getMTime()),
            date("m/d/Y H:i", $fileInfo->getCtime()),

        ];
    }
}

foreach ($searchedFiles as $searchFile) {
    if (isset($searchValue) && $searchValue) {
        if (stristr($searchFile[0], $searchValue)) {
            echo "<tr><th scope='row'>" . fileIcon($searchFile[0]) . "</th>
    <td><span>" . explode(".", $searchFile[0])[0] . "</span><span class='text-uppercase text-black-50 p-2' style='font-size: 0.8rem'>" .  explode(".", $searchFile[0])[1] . "</span>" . "</td>
    <td>" . $searchFile[2] . "</td>
    <td>" . $searchFile[3] . "</td>
    <td>" . $searchFile[4] . "</td>
    </tr> 
    ";
        }
    }
}
