<?php
$search = $_POST['search'];

$files = array_diff(scandir("./root"), array('.', '..'));

$matches = [];
foreach ($files as $file) {
  if (strstr($file, $search)) {
    array_push($matches, $file);
  }
}
echo json_encode($matches);

?>