<?php
    include 'modules/htmlHeader.php';
?>

<body>
    <!-- <nav> -->
    <?php
    include 'modules/navBar.php';
    include 'modules/createModal.php';

    ?>

<?php
      
      $path="./root";
      $dir = new DirectoryIterator($path);
      foreach ($dir as $fileinfo) {
          if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            // echo $fileinfo."<br>";
            $credentials = dirname($fileinfo);
            $pathofFile=  $fileinfo->getFileInfo();
            echo "<a href='$pathofFile'> <i class='fas fa-folder fa-10x'></i></a>";
              // print_r($credentials);
              echo $fileinfo->getFileInfo().'<br>';
              echo $fileinfo->getFilename().'<br>';
          }
      }
      
?>
    <!-- </nav>
    <form action="./createfolder.php" method="post">
    <input name="folderName" type="text"  id="nameFolder">
    <button name="createfolder">Create a folder</button>
    <label class="form-label" for="CreateFile"><?= isset($_GET["error"]) ? "The name already exist" : ""?></label>
    </form>
    <form action="./createfolder.php" method="post">
    <input type="text" name="prueba" id="">
    <button type="submit">Create a file</button>
    <!-- <button onclick="createfile()"> </button> -->
    <!-- </form> -->


</body>
</html>