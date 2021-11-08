<?php 

//si el file extension === que jpg, png, jpeg -> abrelo y muestralo en image modal,
// . . . . . . . . . .  ===  mp3, mp4, WAV, AIFF, OGG, OPUS, FLAC  -> abrelo y muestralo en audio modal,
//.................... === ....................................... -> abrelo y muestralo en video modal,
$fileRoute = $_POST['filePath'];
if(file_exists($_POST['filePath'])) {
  echo ("<div class='modal fade' id='openFileModal' tabindex='-1' aria-labelledby='openFileModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-xl  modal-dialog-centered'>
      <div class='modal-content'>
          <div class='modal-header'>
              <h5 class='modal-title' id='openFileModalLabel'>hola</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
              <div class='modal-body'>
                  <img class='img-fluid' src='" . $fileRoute . "'>
              </div>
              <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-secondary'>Download</button>
                  </div>
                  </div>
                  </div>
                  </div>");
	echo $response;
  } else {
  	$response = false;
  }




// $fileName = ($_POST['filePath']);

// $file = fopen($fileName, "r");

// // Reads the file
// $content = fread($file, filesize($fileName));

// echo $content;
