<?php


$rootPath = "./root";


foreach (scandir($rootPath) as $i) {
    echo $i, "<br>";
};
