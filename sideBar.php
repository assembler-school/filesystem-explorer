<section class="side__menu">
    <form action="./createFolderForm.php" method="POST">
        <input type="submit" value="Create folder">
    </form>
    <form action="upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
</section>