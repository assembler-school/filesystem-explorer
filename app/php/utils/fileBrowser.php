<?php
function fileBrowser($folder = "*")
{
    $arrayFile = glob('../../storage/' . $folder, GLOB_BRACE);
    return $arrayFile;
}
