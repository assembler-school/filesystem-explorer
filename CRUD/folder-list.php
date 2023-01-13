<?php
// session_start();

$root = "root";

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