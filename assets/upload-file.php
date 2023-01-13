<?php
/* Get the name of the uploaded file */
$root = $_POST["uploadFolder"];

$filename = $_FILES['uploadFile']['name'];

/* Choose where to save the uploaded file */
$location = "../root/$root/".$filename;



/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['uploadFile']['tmp_name'], $location) ) { 
  $status['status'] = true;
  $status['msg'] = 'File upload';
} else { 
  $status['status'] = false;
  $status['msg'] = 'There was an error!';
}

echo json_encode($status);
?>