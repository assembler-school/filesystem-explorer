<?php 

$h = fopen('./data.txt', 'w+');

if (fwrite($h, 'text to insert') == false) echo 'Error writing ';
