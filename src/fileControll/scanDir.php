<?php
$directory = '/xampp/htdocs/filesystem-explorer/src/UNIT';

function iterateDirectory($i)
{
  $allPaths = array();

  echo '<ul>';
  foreach ($i as $path) {
    if ($path->getFilename() != "..") {
      if (is_dir($path)) {
        array_push($allPaths, dirname($path));
      } else {
        array_push($allPaths, pathinfo($path)["dirname"] . "\\" . pathinfo($path)["basename"]);
      }
    }
    // echo array_key_last($allPaths);
  }
  echo '</ul>';
  // print_r($allPaths);
}
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

iterateDirectory($iterator);


// scanDirectory($directory);

// function scanDirectory($directory)
// {
//   return $scanned_directory = array_diff(scandir($directory), array('..', '.'));

//   foreach ($scanned_directory as $dir) {
//     if (is_dir("$directory/$dir")) {
//       echo "<li class='folder-tree-folder' data-dir='$dir'>$dir</li>";
//       scanDirectory("$directory/$dir");
//     } else {
//       echo "<li class='folder-tree-file file-info' data-dir='$dir'>$dir</li>";
//     }
//   };
// };

// foreach ($scanned_directory as $dir) {
//   if (is_dir("$directory/$dir")) {
//     echo "<li class='folder-tree-folder' data-dir='$dir'>$dir</li>";
//     scanDirectory("$directory/$dir");
//   } else {
//     echo "<li class='folder-tree-file file-info' data-dir='$dir'>$dir</li>";
//   }
// };
