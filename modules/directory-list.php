<?php
require_once("./modules/file-icon.php");

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
                            <th scope='row'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-folder' viewBox='0 0 16 16'>
  <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
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
                            <th scope='row'>" . fileIcon($file) . "</th>
                            <td>" . explode(".", $file)[0] .  explode(".", $file)[1] . "</td>
                            <td>" . human_filesize(filesize($file)) . "</td>
                            <td>" . date("F d Y H:i:s.", filemtime($file)) . "</td>
                            <td>" . date("F d Y H:i:s.", filectime($file)) . "</td>
                        </tr> ";
}

// $directoryArray = array_map("explodeFileName", $scannedDirectory);

// echo "<br> ";
// var_dump($directoryArray);
