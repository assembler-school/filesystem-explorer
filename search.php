<?php
$search = $_GET["q"];
$array = array();
$arrayTwo = array();


foreach(glob("root/*") as $result){
    array_push($array, $result);
foreach (glob("$result/*") as $file){
    array_push($arrayTwo, $file);
    /* $arrayTwo["$result"][] += $file; */
}
};
$res = array_merge($array, $arrayTwo); 

function array_search_partial($arr, $keyword) {
    foreach($arr as $index => $string) {
        if (strpos($string, $keyword) !== FALSE){
            echo ($arrayTwo[$index]);
            return $index;    
        }
            
    }
   
}


array_search_partial($arrayTwo, $search);

?>