<?php
/* Get the name of the uploaded file */
$root = $_POST["uploadFolder"];

$filename = $_FILES['uploadFile']['name'];

/* Choose where to save the uploaded file */
$location = "../root/$root/".$filename;



/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['uploadFile']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}
?>