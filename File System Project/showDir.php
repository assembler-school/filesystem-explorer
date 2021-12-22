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
function folderSize($dir){
    if (is_file($dir)){
        return filesize($dir);
    }else{
        $size = 0;
        foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
            $size += is_file($each) ? filesize($each) : folderSize($each);
        }
        return $size;

    }
};

function sectionFilesTable()
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
                    $fileSize = bytesToHuman(folderSize($infofile));
                    $lastUpdate= date('F d Y H:i:s', filemtime($infofile));
                    fillTable($extension, $fileName, $fileSize, $lastUpdate);
                }
            }
        }
    };
}

function fillTable($icon, $fileName, $fileSize, $lastUpdate){
    $iconroot= filesIcon($icon);
    echo "<tr>";
    echo "<th scope='row'> $iconroot </th>";
    echo "<td>$fileName</td>";
    echo "<td>$fileSize</td>";
    echo "<td>$lastUpdate</td>";
    echo "</tr>";
};

function filesIcon($extension)
{
    switch ($extension) {
        case 'doc':
            return"<a> img  class='sectionImg' src='./assets/icons/doc.png' alt='doc img'>  </a>";
            break;
        case 'jpg':
            return"<a> <img class='sectionImg'  src='./assets/icons/jpg.png' alt='icon img'> </a>";
            break;
        case 'pdf':
            return"<a> <img class='sectionImg'  src='./assets/icons/pdf.png' alt='icon img'> </a>";
            break;
        case 'csv':
            return"<a> <img class='sectionImg'  src='./assets/icons/csv.png' alt='icon img'> </a>";
            break;
        case 'exe':
            return"<a> <img class='sectionImg'  src='./assets/icons/exe.png' alt='icon img'> </a>";
            break;
        case 'mp3':
            return"<a> <img class='sectionImg'  src='./assets/icons/mp3.png' alt='icon img'> </a>";
            break;
        case 'mp4':
            return"<a> <img class='sectionImg'  src='./assets/icons/mp4.png' alt='icon img'> </a>";
            break;
        case 'odt':
            return"<a> <img class='sectionImg'  src='./assets/icons/odt.png' alt='icon img'> </a>";
            break;
        case 'png':
            return"<a> <img class='sectionImg'  src='./assets/icons/png.png' alt='icon img'  </a>>";
            break;
        case 'ppt':
            return"<a> <img class='sectionImg'  src='./assets/icons/ppt.png' alt='icon img'> </a>";
            break;
        case 'rar':
            return"<a> <img class='sectionImg'  src='./assets/icons/rar.png' alt='icon img'> </a>";
            break;
        case 'svg':
            return"<a> <img class='sectionImg'  src='./assets/icons/svg.png' alt='icon img'> </a>";
            break;
        case 'txt':
            return"<a> <img class='sectionImg'  src='./assets/icons/txt.png' alt='icon img'> </a>";
            break;
        case 'zip':
            return"<a> <img class='sectionImg'   src='./assets/icons/zip.png' alt='icon img' </a> >";
            break;
        default:
            return"<a> <img class='sectionImg'   src='./assets/icons/folder.png' alt='icon i </a>mg' >";
            break;
    };
}

function asideFiles()
{

}
