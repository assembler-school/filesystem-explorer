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
      // $credentials = dirname(__DIR__,-1) . '.\root';
      // print_r($credentials);
      $dir = new DirectoryIterator($path);
      foreach ($dir as $fileinfo) {
          if ($fileinfo->isDir() && !$fileinfo->isDot()) {
            // echo $fileinfo."<br>";
            $credentials = dirname($fileinfo);
            $pathofFile=  $fileinfo->getFileInfo();
            // echo $credentials;
            // print `<i class="fas fa-folder fa-10x"> <a href="$pathofFile" class="text-white-50 fw-bold"></a></i>`;
            echo "<a href='$pathofFile'> <i class='fas fa-folder fa-10x'></i></a>";
              // print_r($credentials);
              echo $fileinfo->getFileInfo();
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