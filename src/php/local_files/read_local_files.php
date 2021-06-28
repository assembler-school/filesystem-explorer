<?php

// create directorio or file
// glob("*.php");

// create folder y al mismo tiempo hay que mirar si existe esa carpeta con el mismo nombre
// mkdir("nombre");
// if (!file_exists("nombre")){
// 	mkdir("nombre");
// };

// copy files
// copy("nombre de carpeta", "nombre de  arpeta");

// (1) Manera de hacerlo con Scandir
function clean_scandir($dir)
{
  $files = scandir($dir);
  // array_diff te coge dos arrays diferentes y te devuelve un array con la diferencia de ellas.
  $new_array_sin_puntos = array_diff($files, [".", ".."]);
  // array_values lo que hace, te indexa de nuevo el array para que empiece desde el indice 0 en adelante
  $values_of_array = array_values($new_array_sin_puntos);

  return $values_of_array;
}

function read_local_folders(){
	$sesion_name = strstr($_SESSION["email"], "@", true);
  $local_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";
  $files = clean_scandir($local_dir);

  foreach ($files as $dir) {
    if (is_dir($local_dir . "/" . $dir)) {
      $name_file = $dir;
      $extension_file = "./../../../doc/img/folder-invoices--v1.png";
      create_div_template($name_file, $extension_file);
    }
  }
}

function read_local_files()
{
  $sesion_name = strstr($_SESSION["email"], "@", true);
  $local_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";
  $files = clean_scandir($local_dir);

  foreach ($files as $dir) {
    if (is_file($local_dir . "/" . $dir)) {
      $name_file = strstr($dir, ".", true);
      $extension_file = strstr($dir, ".");
      $new_extension_file = check_extension_file($extension_file);
      create_div_template($name_file, $new_extension_file);
    }
  }
}

function check_extension_file($extension_file)
{
  if ($extension_file == ".png") {
    $extension_file = "./../../../doc/img/png.png";
    return $extension_file;
  } elseif ($extension_file == ".rar") {
    $extension_file = "./../../../doc/img/28792.png";
    return $extension_file;
  } elseif ($extension_file == ".zip") {
    $extension_file = "./../../../doc/img/28814.png";
    return $extension_file;
  } elseif ($extension_file == ".svg") {
    $extension_file = "./../../../doc/img/29080.png";
    return $extension_file;
  } elseif ($extension_file == ".mp4") {
    $extension_file = "./../../../doc/img/29122.png";
    return $extension_file;
  } elseif ($extension_file == ".odt") {
    $extension_file = "./../../../doc/img/29146.png";
    return $extension_file;
  } elseif ($extension_file == ".mp3") {
    $extension_file = "./../../../doc/img/592965.png";
    return $extension_file;
  } elseif ($extension_file == ".csv") {
    $extension_file = "./../../../doc/img/csv.png";
    return $extension_file;
  } elseif ($extension_file == ".txt") {
    $extension_file = "./../../../doc/img/descargar.png";
    return $extension_file;
  } elseif ($extension_file == ".exe") {
    $extension_file = "./../../../doc/img/exe-icon.png";
    return $extension_file;
  } elseif ($extension_file == ".jpg") {
    $extension_file = "./../../../doc/img/jpg.png";
    return $extension_file;
  } elseif ($extension_file == ".pdf") {
    $extension_file =
      "./../../../doc/img/png-clipart-pdf-computer-icons-document-file-format-pdf-miscellaneous-text.png";
    return $extension_file;
  } elseif ($extension_file == ".pptx") {
    $extension_file = "./../../../doc/img/powerpoint-icon-png-20.jpg";
    return $extension_file;
  } else {
    // aquí debería ir una imagen de archivo no reconocido
    $extension_file = "./../../../doc/img/folder-invoices--v1.png";
    return $extension_file;
  }
}

function create_div_template($name_file, $new_extension_file)
{
  $html = new DOMDocument("1.0", "iso-8859-1");
  $html->formatOutput = true;

  $maindiv = $html->createElement("div");
  $maindiv->setAttribute(
    "class",
    "col d-flex justify-content-center align-items-center"
  );
  $html->appendChild($maindiv);

  $mainSection = $html->createElement("section");
  $mainSection->setAttribute(
    "class",
    "file__item--wrapper d-flex flex-column align-items-center"
  );
  $maindiv->appendChild($mainSection);

  $first_div = $html->createElement("div");
  $mainSection->appendChild($first_div);

  $file_img = $html->createElement("img");
  $file_img->setAttribute("src", $new_extension_file);
  $file_img->setAttribute("alt", "");
  $first_div->appendChild($file_img);

  $second_div = $html->createElement("div");
  $mainSection->appendChild($second_div);

  $title_folder = $html->createElement("h6");
  $title_folder->appendChild($html->createTextNode($name_file));
  $second_div->appendChild($title_folder);

  echo html_entity_decode($html->saveHTML());
}

// (2) Manera de hacerlo con Opendir y readdir

// function clean_readdir($dir)
// {
//   $filesTwo = [];

//   if ($handle = opendir($dir)) {
//     while (false !== ($file = readdir($handle))) {
//       if ($file != "." && $file != "..") {
//         $filesTwo[] = $file;
//       }
//     }
//     closedir($handle);
//   }
//   return $filesTwo;
// }
?>

<!-- Este seria nuestro Template -->
<!-- <div class="col d-flex justify-content-center align-items-center">
	<section class="file__item--wrapper d-flex flex-column align-items-center">
		<div>
			<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
		</div>
		<div>
			<h6>
				titulo de la carpeta
			</h6>
		</div>
	</section>
</div> -->
