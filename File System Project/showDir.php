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
                    $infofile = $pr->getFileInfo();
                    $extension = $pr->getExtension();
                    $fileName = $pr->getFilename();
                    $fileSize = folderSize($pr);
                    $lastUpdate= date('F d Y H:i:s', filemtime($infofile));
                    $fileIcons = filesIcon($extension);
                    //$newfilepath= "?$fileinfo?$nme";
                    //echo $pr->getFilename() . "<br>";
                    // echo $pr->getFileInfo();
                    fillTable($fileIcons, $fileName, $fileSize, $lastUpdate);
                }
            }
        }
    };
}

function fillTable($icon,  $fileName, $fileSize, $lastUpdate){

    echo "<tr>";
    echo "<th scope='row'> $icon </th>";
    echo "<td>$fileName</td>";
    echo "<td>$fileSize</td>";
    echo "<td>$lastUpdate</td>";
    echo "</tr>";
};

function filesIcon($extension)
{
    switch ($extension) {
        case 'doc':
            "<a> <img  class='sectionImg' src='./assets/icons/doc.png' alt='doc img'>  </a>";
            break;
        case 'jpg':
            "<a> <img class='sectionImg'  src='./assets/icons/jpg.png' alt='icon img'> </a>";
            break;
        case 'pdf':
            "<a> <img class='sectionImg'  src='./assets/icons/pdf.png' alt='icon img'> </a>";
            break;
        case 'csv':
            "<a> <img class='sectionImg'  src='./assets/icons/csv.png' alt='icon img'> </a>";
            break;
        case 'exe':
            "<a> <img class='sectionImg'  src='./assets/icons/exe.png' alt='icon img'> </a>";
            break;
        case 'mp3':
            "<a> <img class='sectionImg'  src='./assets/icons/mp3.png' alt='icon img'> </a>";
            break;
        case 'mp4':
            "<a> <img class='sectionImg'  src='./assets/icons/mp4.png' alt='icon img'> </a>";
            break;
        case 'odt':
            "<a> <img class='sectionImg'  src='./assets/icons/odt.png' alt='icon img'> </a>";
            break;
        case 'png':
            "<a> <img class='sectionImg'  src='./assets/icons/png.png' alt='icon img'  </a>>";
            break;
        case 'ppt':
            "<a> <img class='sectionImg'  src='./assets/icons/ppt.png' alt='icon img'> </a>";
            break;
        case 'rar':
            "<a> <img class='sectionImg'  src='./assets/icons/rar.png' alt='icon img'> </a>";
            break;
        case 'svg':
            "<a> <img class='sectionImg'  src='./assets/icons/svg.png' alt='icon img'> </a>";
            break;
        case 'txt':
            "<a> <img class='sectionImg'  src='./assets/icons/txt.png' alt='icon img'> </a>";
            break;
        case 'zip':
            "<a> <img class='sectionImg'   src='./assets/icons/zip.png' alt='icon img' </a> >";
            break;
        default:
            "<a> <img class='sectionImg'   src='./assets/icons/folder.png' alt='icon i </a>mg' >";
            break;
    };
}

function asideFiles()
{

}
