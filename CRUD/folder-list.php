<?php

$root = "./root";

  function viewElements($root){
    if (is_dir($root)){
        $manager = opendir($root);
        echo "<ul>";
        
        while (($file = readdir($manager)) !== false)  {

            $complete_route = $root . "/" . $file;

            if ($file != "." && $file != "..") {
                if (is_dir($complete_route)) {
                    echo "<li class='folderElements'><a href='?route=$file'>" . $file . "</a></li>";
                    viewElements($complete_route);
                } else {
                    echo "<li class='folderElements'><a href='?route=$file'>" . $file . "</a></li>";
                }
            }
        }

        closedir($manager);
        echo "</ul>";
    } else {
        echo "Not a valid directory path<br/>";
    }
}



// function showFiles($raiz){
//     $dir = opendir($route);
//     $files = array();
//     while ($current = readdir($dir)){
//         if( $current != "." && $current != "..") {
//             if(is_dir($route.$current)) {
//                 showFiles($route.$current.'/');
//             }
//             else {
//                 $files[] = $current;
//             }
//         }
//     }
//     echo '<h2>'.$route.'</h2>';
//     echo '<ul>';
//     for($i=0; $i<count( $files ); $i++){
//         echo '<li>'.$files[$i]."</li>";
//     }
//     echo '</ul>';
// }

?>