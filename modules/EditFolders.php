<?php
/*EDIT RENAME FILE*/

$action = (isset($_POST['']))
if(isset($_POST['Edit-Form'])){
  $old_name = "./../root/nueva";
  $new_name = "./../root/".$_POST['edit-name'];
  $name = rename($old_name, $new_name);
  print_r($element);
  header('Location: ./../index.php');
  };

