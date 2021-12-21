<?php
$path = "./root";
$dir = new DirectoryIterator($path);
foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        $credentials = dirname($fileinfo);
        $pathofFile =  $fileinfo->getFileInfo();
        echo "<a href='./index.php?$fileinfo'> <i class='fas fa-folder fa-10x'></i></a>";
        echo $fileinfo->getFilename() . '<br>';
        echo date('F d Y H:i:s', filemtime($pathofFile)) . '<br>';
        echo bytesToHuman(folderSize($pathofFile)) . "<br>";
    }
};

foreach ($dir as $fileF) {
    if ($fileF->isfile()) {

        echo $fileF->getExtension() . "<br>";
    }
};

//todo Convert bites to readable size
function bytesToHuman($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    for ($i = 0; $bytes > 1024; $i++) $bytes /= 1024;
    return round($bytes, 3) . ' ' . $units[$i];
};

//todo return the size of folder or file
function folderSize($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
};

function sectionFiles()
{
    $path = "./root";
    $newDir = new DirectoryIterator($path);
    foreach ($newDir as $fileinfo) {
        if (isset($_GET["$fileinfo"])) {
            $newPath = "./root/$fileinfo";
            $probandol = new DirectoryIterator($newPath);
            foreach ($probandol as $pr) {
                if (!$pr->isDot()) {
                    $extension = $pr->getExtension();
                    //echo bytesToHuman(folderSize($pr)) . "<br>";
                    filesIcon($extension);
                    echo $pr->getFilename() . "<br>";
                    // echo $pr->getFileInfo();
                }
            }
        }
    };
}

function filesIcon($extension)
{
    switch ($extension) {
        case 'doc':
            echo '<a href="ppee"><img  class="sectionImg" src="./assets/icons/doc.png" alt="doc img"></a> ';
            break;
        case 'jpg':
            echo ' <img class="sectionImg"  src="./assets/icons/jpg.png" alt="icon img">';
            break;
        case 'pdf':
            echo ' <img class="sectionImg"  src="./assets/icons/pdf.png" alt="icon img">';
            break;
        case 'csv':
            echo ' <img class="sectionImg"  src="./assets/icons/csv.png" alt="icon img">';
            break;
        case 'exe':
            echo ' <img class="sectionImg"  src="./assets/icons/exe.png" alt="icon img">';
            break;
        case 'mp3':
            echo ' <img class="sectionImg"  src="./assets/icons/mp3.png" alt="icon img">';
            break;
        case 'mp4':
            echo ' <img class="sectionImg"  src="./assets/icons/mp4.png" alt="icon img">';
            break;
        case 'odt':
            echo ' <img class="sectionImg"  src="./assets/icons/odt.png" alt="icon img">';
            break;
        case 'png':
            echo ' <img class="sectionImg"  src="./assets/icons/png.png" alt="icon img" >';
            break;
        case 'ppt':
            echo ' <img class="sectionImg"  src="./assets/icons/ppt.png" alt="icon img">';
            break;
        case 'rar':
            echo ' <img class="sectionImg"  src="./assets/icons/rar.png" alt="icon img">';
            break;
        case 'svg':
            echo ' <img class="sectionImg"  src="./assets/icons/svg.png" alt="icon img">';
            break;
        case 'txt':
            echo ' <img class="sectionImg"  src="./assets/icons/txt.png" alt="icon img">';
            break;
        case 'zip':
            echo ' <img class="sectionImg"   src="./assets/icons/zip.png" alt="icon img" >';
            break;
        default:
            echo ' <img class="sectionImg"   src="./assets/icons/folder.png" alt="icon img" >';
            break;
    };
}
