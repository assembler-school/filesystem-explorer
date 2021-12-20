<?php
$path = "./root";
$dir = new DirectoryIterator($path);
foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        $credentials = dirname($fileinfo);
        $pathofFile =  $fileinfo->getFileInfo();
        
        //echo "<a href='$pathofFile'> <i class='fas fa-folder fa-10x'></i></a>";
        //file root
        //echo $fileinfo->getFileInfo();
       // echo $fileinfo->getFilename() . '<br>';
    }
}
