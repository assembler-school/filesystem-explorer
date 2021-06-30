<?php

function list_folders($dir)
{
  $files = array_diff(scandir($dir), array('.', '..'));

  if ((count($files) < 1) && (count($_SESSION["folders_paths"]) == 0)) {
    // echo 'No folders';
    return;
  }

  if (count($_SESSION["folders_paths"]) == 0) {
    array_push($_SESSION["folders_paths"], $dir);
    if (count($_SESSION["folders_unfold"]) == 0) array_push($_SESSION["folders_unfold"], "false");

    $username = $_SESSION["username"];

    echo '<li>';
    if ($_SESSION["folders_unfold"][0] == "false") echo "<input type='checkbox' name='list' id='root_folder'>";
    else echo "<input type='checkbox' name='list' id='root_folder' checked>";
    if ((isset($_GET["folder-id"])) && ($_GET["folder-id"] == 0)) echo "<label class='d-flex align-items-center folder-active' for='root_folder' onclick='showFiles(0)'>";
    else echo "<label class='d-flex align-items-center' for='root_folder' onclick='showFiles(0)'>";
    echo "<i class='uil uil-folder me-2'></i>";
    echo "<div class='folder-name' title='My Cloud'>My Cloud ($username)</div>";
    echo "</label>";
  }

  echo '<ul class="interior">';
  foreach ($files as $file_item) {
    if (is_dir($dir . '/' . $file_item)) {
      array_push($_SESSION["folders_paths"], $dir . '/' . $file_item);

      $cnt = count($_SESSION["folders_paths"]) - 1;

      if (count($_SESSION["folders_unfold"]) < count($_SESSION["folders_paths"])) {
        array_push($_SESSION["folders_unfold"], "false");
      }

      echo '<li>';
      if ($_SESSION["folders_unfold"][$cnt] == "false") echo "<input type='checkbox' name='list' id='folder_$cnt'>";
      else echo "<input type='checkbox' name='list' id='folder_$cnt' checked>";
      if ((isset($_GET["folder-id"])) && ($cnt == $_GET["folder-id"])) echo "<label class='d-flex align-items-center folder-active' for='folder_$cnt' onclick='showFiles($cnt)'>";
      else echo "<label class='d-flex align-items-center' for='folder_$cnt' onclick='showFiles($cnt)'>";
      echo "<i class='uil uil-folder me-2'></i>";
      echo "<div class='folder-name' title='$file_item'>$file_item</div>";
      echo "</label>";

      list_folders($dir . '/' . $file_item);

      echo '</li>';
    }
  }
  echo '</ul>';

  if (count($_SESSION["folders_paths"]) == 0) echo '</li>';
}

function folders_init()
{
  $_SESSION["folders_paths"] = array();
  if (!isset($_SESSION["folders_unfold"])) $_SESSION["folders_unfold"] = array();

  if (isset($_GET["folder-id"])) {
    if ($_SESSION["folders_unfold"][$_GET["folder-id"]] == "false") $_SESSION["folders_unfold"][$_GET["folder-id"]] = "true";
    else $_SESSION["folders_unfold"][$_GET["folder-id"]] = "false";
  }

  $sesion_name = $_SESSION["username"];
  $root_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";
  list_folders($root_dir);
}

function folder_size($dir)
{
  $size = 0;

  foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
    $size += is_file($each) ? filesize($each) : folder_size($each);
  }

  return $size;
}

function get_total_size()
{
  $sesion_name = $_SESSION["username"];

  $main_folder_path = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";
  $trash_folder_path = 'C:/xampp\htdocs/filesystem-explorer/root/' . $sesion_name . '__trash';

  $total_size = folder_size($main_folder_path);
  $total_size += folder_size($trash_folder_path);

  if ($total_size < 1000) echo '<div>Storage: ' . $total_size . 'B</div>';
  else if ($total_size < 1000000) {
    $total_size = round($total_size / 1000, 2);
    echo '<div>Storage: ' . $total_size . 'KB</div>';
  } else if ($total_size < 1000000000) {
    $total_size = round($total_size / 1000000, 2);
    echo '<div>Storage: ' . $total_size . 'MB</div>';
  } else if ($total_size < 1000000000000) {
    $total_size = round($total_size / 1000000000, 2);
    echo '<div>Storage: ' . $total_size . 'GB</div>';
  }
}

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

function read_local_folders()
{
  $sesion_name = $_SESSION["username"];

  if (isset($_GET["folder-id"])) {
    $local_dir = $_SESSION["folders_paths"][$_GET["folder-id"]];
  } else $local_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";

  if (isset($_GET["trash"])) $local_dir = 'C:/xampp\htdocs/filesystem-explorer/root/' . $sesion_name . '__trash';

  $files = clean_scandir($local_dir);

  $n_folders = 0;
  foreach ($files as $dir) {
    if (is_dir($local_dir . "/" . $dir)) {
      $n_folders += 1;
      $name_file = $dir;
      $complete_name_file = $dir;
      $extension_file = "./../../../doc/img/folder-invoices--v1.png";
      create_div_template($name_file, $extension_file, $complete_name_file);
    }
  }
  if ($n_folders == 0) echo "<div>No folders</div>";
}

function read_local_files()
{
  $sesion_name = $_SESSION["username"];

  if (isset($_GET["folder-id"])) {
    $local_dir = $_SESSION["folders_paths"][$_GET["folder-id"]];
  } else $local_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";

  if (isset($_GET["trash"])) $local_dir = 'C:/xampp\htdocs/filesystem-explorer/root/' . $sesion_name . '__trash';

  $files = clean_scandir($local_dir);
  // var_dump ($files);

  $n_files = 0;
  foreach ($files as $dir) {
    if (is_file($local_dir . "/" . $dir)) {
      $n_files += 1;
      $name_file = strstr($dir, ".", true);
      // $complete_name_file = strstr($dir, ".", true);
      $complete_name_file = $dir;
      $extension_file = strstr($dir, ".");
      $new_extension_file = check_extension_file($extension_file);

      create_div_template($name_file, $new_extension_file, $complete_name_file);
    }
  }
  if ($n_files == 0) echo "<div>No files</div>";
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

function create_div_template(
  $name_file,
  $new_extension_file,
  $complete_name_file
) {
  $sesion_name = $_SESSION["username"];
  $local_dir = "C:/xampp\htdocs/filesystem-explorer/root/$sesion_name";

  $html = new DOMDocument("1.0", "iso-8859-1");
  $html->formatOutput = true;

  $maindiv = $html->createElement("div");
  $maindiv->setAttribute(
    "class",
    "col d-flex justify-content-center align-items-center open_modal"
  );

  $maindiv->setAttribute("aria-disabled", "true");
  $maindiv->setAttribute("data-source", "$local_dir/$complete_name_file");
  $maindiv->setAttribute("id", $complete_name_file);
  $html->appendChild($maindiv);

  $mainSection = $html->createElement("section");
  $mainSection->setAttribute(
    "class",
    "file__item--wrapper d-flex flex-column align-items-center"
  );
  $mainSection->setAttribute("data-source", "$local_dir/$complete_name_file");
  $maindiv->appendChild($mainSection);

  $first_div = $html->createElement("div");
  $first_div->setAttribute("data-source", "$local_dir/$complete_name_file");
  $mainSection->appendChild($first_div);

  $file_img = $html->createElement("img");
  $file_img->setAttribute("src", $new_extension_file);
  $file_img->setAttribute("data-source", "$local_dir/$complete_name_file");
  $file_img->setAttribute("alt", "");
  $first_div->appendChild($file_img);

  $second_div = $html->createElement("div");
  $second_div->setAttribute("data-source", "$local_dir/$complete_name_file");
  $mainSection->appendChild($second_div);

  $title_folder = $html->createElement("h6");
  $title_folder->setAttribute("data-source", "$local_dir/$complete_name_file");
  $title_folder->appendChild($html->createTextNode($name_file));
  $second_div->appendChild($title_folder);

  echo html_entity_decode($html->saveHTML());
}
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