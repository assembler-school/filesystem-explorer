<!-- test  -->
<?php
function pre_r($array)
{
    echo "<hr>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    echo "<hr>";
}
$local_dir = "root/images";
$files = scandir($local_dir);
$files = array_diff($files, array(".", "..", ".DS_Store"));
$files = array_values($files);
$files = array();
$files = array_values(array_diff(scandir($local_dir), array(".", "..", ".DS_Store")));


function clean_scandir($dir)
{
    return array_values(array_diff(scandir($dir), array(".", "..", ".DS_Store")));
}

function clean_readdir($dir)
{
    $files = array();

    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file != ".DS_Store") {
                $files[] = $file;
                //  echo "<img src='$dir/$file'><br>";
            }
        }
        closedir($handle);
    }
    return $files;
}
pre_r(clean_readdir($local_dir));
// $ext_local = explode(".", clean_readdir($local_dir));
$ext_local = end($ext_local);
?>