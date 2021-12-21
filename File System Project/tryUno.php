<?php

function truOne($par){
    echo $par;
    $filename = $par;
    $f = fopen($filename, 'r');
    echo $f;
    fclose($f);
}