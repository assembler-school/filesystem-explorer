<?php
$path = "./root";
// $credentials = dirname(__DIR__,-1) . '.\root';
// print_r($credentials);
$dir = new DirectoryIterator($path);
foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        // echo $fileinfo."<br>";
        $credentials = dirname($fileinfo);
        $pathofFile =  $fileinfo->getFileInfo();
        // echo $credentials;
        // print `<i class="fas fa-folder fa-10x"> <a href="$pathofFile" class="text-white-50 fw-bold"></a></i>`;
        echo "<a href='$pathofFile'> <i class='fas fa-folder fa-10x'></i></a>";
        // print_r($credentials);
        echo $fileinfo->getFileInfo();
        echo $fileinfo->getFilename() . '<br>';
    }
}
