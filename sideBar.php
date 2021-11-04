<?php
$directory = 'upload.php';
if (isset($_GET["directory"])) {
  $directory = "upload.php?directory=" . $_GET['directory'];
}
?>

<section class="side__menu">
  <form action="./createFolderForm.php" method="POST">
    <input type="submit" value="Create folder">
  </form>
  <form <?php echo "action=$directory" ?> method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
  </form>
</section>