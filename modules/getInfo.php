<?php
if (isset($_GET['path'])) {
    $pathToff = "." . $_GET['path'];
} else {
    $pathToff = $_SESSION['curr_path'];
}

function getInfo($ff = './root')
{
    $path = $ff;
    $explodedSlash = explode('/', $path);

    if (is_dir($ff)) {
        $name = $explodedSlash[count($explodedSlash) - 1];
        $type = 'Folder';
        $size = getDirectorySize($ff);
        $lastUpdateDate = date("d-m-y - H:i:s", filemtime($ff));
        $creationDate = date("d-m-y - H:i:s", filectime($ff));

    } else if (is_file($ff)) {
        $explodedDot = explode('.', $path);
        $name = explode('.', $explodedSlash[count($explodedSlash) - 1])[0];
        $type = $explodedDot[count($explodedDot) - 1];
        $size = filesize($ff);
        $lastUpdateDate = date("d-m-y - H:i:s", filemtime($ff));
        $creationDate = date("d-m-y - H:i:s", filectime($ff));
    }

    echo json_encode([
        "ok" => true,
        "name" => $name,
        "type" => $type,
        "size" => $size,
        "lastUpdateDate" => $lastUpdateDate,
        "creationDate" => $creationDate
    ]);
}

getInfo($pathToff);

function getDirectorySize($path)
{
    $bytestotal = 0;
    $path = realpath($path);
    if ($path !== false && $path != '' && file_exists($path)) {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}
