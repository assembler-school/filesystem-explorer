<?php
    $path = "./root";
    $dir = new DirectoryIterator($path);
    foreach ($dir as $fileinfo) {
        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            $credentials = dirname($fileinfo);
            $pathofFile =  $fileinfo->getFileInfo();
            echo "<a href='$pathofFile'> <i class='fas fa-folder fa-10x'></i></a>";
            echo $fileinfo->getFilename() . '<br>';
            echo date('F d Y H:i:s', filemtime($pathofFile)) . '<br>';
            echo bytesToHuman(folderSize($pathofFile));
        }
    };

    foreach ($dir as $fileF) {
        if ($fileF->isfile()) {
            echo $fileF . "<br>";
            print $fileF;
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