<?php
$directory = './components/upload.php';
if (isset($_GET["directory"])) {
  $directory = "./components/upload.php?directory=" . $_GET['directory'];
}
?>

<section class="container d-flex flex-column text-center">
  <?php require_once("./components/createFolderForm.php"); ?>
  <form class="container d-flex flex-column custom-file m-1"<?php echo "action=$directory" ?> method="post" enctype="multipart/form-data">
    <input class="custom-file-input mt-1 d-none" type="file" name="fileToUpload" id="fileToUpload">
    <label class="btn btn-outline-secondary m-1" for="fileToUpload">Select a File</label>
    <input class="btn btn-outline-secondary m-1" type="submit" value="Upload File" name="submit">
  </form>
  <input type="button" class="btn btn-outline-secondary m-3" value="Trash Bin">
  <hr>
  
</section>