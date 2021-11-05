<?php
$directory = './components/upload.php';
if (isset($_GET["directory"])) {
  $directory = "./components/upload.php?directory=" . $_GET['directory'];
}
?>

<section class="container d-flex flex-column text-center">
  <form class="container d-flex flex-column"<?php echo "action=$directory" ?> method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
  </form>
  
</section>