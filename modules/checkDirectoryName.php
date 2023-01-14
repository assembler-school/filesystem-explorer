<?php
$directoryName = $_REQUEST["directoryName"];

if(is_dir("../files/".$directoryName)){
    echo json_encode("Exist");
}else{
    echo json_encode("not exist");
}
