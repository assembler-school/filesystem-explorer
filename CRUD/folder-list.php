<?php

$root = "./root";

  function viewFolderStructure($root){
    if (is_dir($root)){
        $manager = opendir($root);
        echo "<ul>";
        
        while (($file = readdir($manager)) !== false)  {

            $complete_route = $root . "/" . $file;

            if ($file != "." && $file != "..") {
                if (is_dir($complete_route)) {
                    echo "<li class='folderElements'><a href='?route=$complete_route'>" . $file . "</a></li>";
                    viewFolderStructure($complete_route);
                } else {
                    echo "<li class='folderElements'><a href='?route=$complete_route'>" . $file . "</a></li>";
                }
            }
        }

        closedir($manager);
        echo "</ul>";
    } else {
        echo "Not a valid directory path<br/>";
    }
}

if(isset($_SESSION) && isset($_REQUEST["route"])) {
    $completeRoot = $_REQUEST["route"];

}


function viewFolderElements($completeRoot){
    if (is_dir($completeRoot)){
        $manager = opendir($completeRoot);
        echo "<ul>";
        
        while (($file = readdir($manager)) !== false)  {

            $completeRoot = $completeRoot . "/" . $file;

            if ($file != "." && $file != "..") {
                if (is_dir($completeRoot)) {
                    echo "<li class='folderElements'><a href='?route=$file'>" . $file . "</a></li>";
                    viewFolderElements($completeRoot);
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


// -----------------------------------------------------------------


// $root = "./root";

//   function viewElements($root, $rutaRelativa){
//     if (is_dir($rutaRelativa)){
//         $manager = opendir($rutaRelativa);
//         echo "<ul>";
        
//         while (($file = readdir($manager)) !== false)  {

//             $complete_route = $rutaRelativa . "/" . $file;
//             var_dump($complete_route);

//             if ($file != "." && $file != "..") {
//                 if (is_dir($complete_route)) {
//                     echo "<li class='folderElements'><a href='?route=$file'>$file</a></li>";
//                 //    viewElements($complete_route);
//                 } else {
//                     echo "<li class='folderElements'><a href='?route=$file'>$file</a></li>";
//                 }
//             }
//         }

//         closedir($manager);
//         echo "</ul>";
//     } else {
//         echo "Not a valid directory path<br/>";
//     }
// }

// ----------------------------------------------------------------------------

// $root = 'root';

// function viewElements($root){
//     $dir = opendir($root);
//     $files = array();
//     while ($current = readdir($dir)){
//         if( $current != "." && $current != "..") {
//             if(is_dir($root.$current)) {
//                 viewElements($root.$current.'/');
//             }
//             else {
//                 $files[] = $current;
//             }
//         }
//     }
//     echo '<h2>'.$root.'</h2>';
//     echo '<ul>';
//     for($i=0; $i<count( $files ); $i++){
//         echo '<li>'.$files[$i]."</li>";
//     }
//     echo '</ul>';
// }

?>