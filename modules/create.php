<?php
if ($_POST["path"] != "") {

  $my_dir = './../' . $_POST["path"] . '/';
  echo $my_dir;
} else {
  $my_dir = "./../root/";
  echo $my_dir;
}
$my_dir .= $_POST["file_name"];
if (!is_dir($my_dir)) {
  mkdir($my_dir);
  echo "Se ha creado el directorio $my_dir";
} else {
  echo "el directorio $my_dir ya existe! No lo vamos a crear de nuevo";
}
