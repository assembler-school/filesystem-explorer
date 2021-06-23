<?php
// Change current directory to root
$homeDir = "./root";
chdir($homeDir);
// echo "<br>" . getcwd() . "<br>";

$currentDirectory = getcwd();
// $currentDirectory = "";
// $scannedDirectory = array_diff(scandir($homeDir . $currentDirectory), array('..', '.'));
$scannedDirectory = array_diff(scandir("./"), array('..', '.'));
// var_dump($scannedDirectory);

function isFile($file)
{
    return filetype($file) == "file";
}

function isDir($file)
{
    return filetype($file) == "dir";
}

$foldersArray = array_filter($scannedDirectory, "isDir");
$filesArray = array_filter($scannedDirectory, "isFile");


function explodeFileName($fileName)
{
    return explode(".", $fileName);
}

function human_filesize($bytes, $decimals = 2)
{
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}


foreach ($foldersArray as $folder) {
    // echo "Folder: " . $folder . "<br>";
    // echo " was last modified: " . date("F d Y H:i:s.", filemtime($folder)) . "<br>";
    // echo " was created: " . date("F d Y H:i:s.", filectime($folder)) . "<br>"; // Doesn't work on Unix
    echo ("<tr>
                            <th scope='row'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder-fill' viewBox='0 0 16 16'>
                                    <path d='M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z' />
                                </svg></th>
                            <td>" . $folder . "</td>
                            <td></td>
                            <td>" . date("F d Y H:i:s.", filemtime($folder)) . "</td>
                            <td>" . date("F d Y H:i:s.", filectime($folder)) . "</td>
                        </tr>");
}

foreach ($filesArray as $file) {
    /* echo "File name: " . $file;
    echo " was last modified: " . date("F d Y H:i:s.", filemtime($file)) . "<br>";
    echo " was created: " . date("F d Y H:i:s.", filectime($file)) . "<br>"; // Doesn't work on Unix
    echo  " size:" . human_filesize(filesize($file)) . "<br>"; */
    echo "<tr>
                            <th scope='row'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-image-fill' viewBox='0 0 16 16'>
                                    <path d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707v5.586l-2.73-2.73a1 1 0 0 0-1.52.127l-1.889 2.644-1.769-1.062a1 1 0 0 0-1.222.15L2 12.292V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zm-1.498 4a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z' />
                                    <path d='M10.564 8.27 14 11.708V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-.293l3.578-3.577 2.56 1.536 2.426-3.395z' />
                                </svg></th>
                            <td>" . explode(".", $file)[0] .  explode(".", $file)[1] . "</td>
                            <td>" . human_filesize(filesize($file)) . "</td>
                            <td>" . date("F d Y H:i:s.", filemtime($file)) . "</td>
                            <td>" . date("F d Y H:i:s.", filectime($file)) . "</td>
                        </tr> ";
}

// $directoryArray = array_map("explodeFileName", $scannedDirectory);

// echo "<br> ";
// var_dump($directoryArray);
