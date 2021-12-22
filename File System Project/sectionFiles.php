<?php
// function sectionFiles(){
//     $path = "./root";
//     $newDir = new DirectoryIterator($path);
//     foreach ($newDir as $fileinfo) {
//         if (isset($_GET["$newDir"])) {
//             $newPath = "./root/$newDir";
//             $probandol = new DirectoryIterator($newPath);
//             foreach ($probandol as $pr) {
//                 if (!$pr->isDot()) {
//                     $extension = $pr->getExtension();
//                     filesIcon($extension);
//                     echo $pr->getFilename() . "<br>";
//                     // echo $pr->getFileInfo();
//                 }
//             }
//         }
//     };

// }

// function filesIcon($extension)
// {
//     switch ($extension) {
//         case 'doc':
//             echo ' <img  class="sectionImg"  src="./assets/icons/doc.png" alt="doc img">';
//             break;
//         case 'jpg':
//             echo ' <img class="sectionImg"  src="./assets/icons/jpg.png" alt="icon img">';
//             break;
//         case 'pdf':
//             echo ' <img class="sectionImg"  src="./assets/icons/pdf.png" alt="icon img">';
//             break;
//         case 'csv':
//             echo ' <img class="sectionImg"  src="./assets/icons/csv.png" alt="icon img">';
//             break;
//         case 'exe':
//             echo ' <img class="sectionImg"  src="./assets/icons/exe.png" alt="icon img">';
//             break;
//         case 'mp3':
//             echo ' <img class="sectionImg"  src="./assets/icons/mp3.png" alt="icon img">';
//             break;
//         case 'mp4':
//             echo ' <img class="sectionImg"  src="./assets/icons/mp4.png" alt="icon img">';
//             break;
//         case 'odt':
//             echo ' <img class="sectionImg"  src="./assets/icons/odt.png" alt="icon img">';
//             break;
//         case 'png':
//             echo ' <img class="sectionImg"  src="./assets/icons/png.png" alt="icon img" >';
//             break;
//         case 'ppt':
//             echo ' <img class="sectionImg"  src="./assets/icons/ppt.png" alt="icon img">';
//             break;
//         case 'rar':
//             echo ' <img class="sectionImg"  src="./assets/icons/rar.png" alt="icon img">';
//             break;
//         case 'svg':
//             echo ' <img class="sectionImg"  src="./assets/icons/svg.png" alt="icon img">';
//             break;
//         case 'txt':
//             echo ' <img class="sectionImg"  src="./assets/icons/txt.png" alt="icon img">';
//             break;
//         case 'zip':
//             echo ' <img class="sectionImg"   src="./assets/icons/zip.png" alt="icon img" >';
//             break;
//     };
// }
