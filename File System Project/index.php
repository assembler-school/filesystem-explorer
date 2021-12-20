<?php
    include 'modules/htmlHeader.php';
?>
<?php
 include 'modules/navBar.php';
 include 'modules/createModal.php';
?>
<body>
    <!-- <nav> -->
        <?php
        // include 'modules/navBar.php';

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
      foreach ($dir as $fileF){
          if ($fileF -> isfile() ){
              echo $fileF."<br>";
            print $fileF;
          }
      }
?>
<form action="./createfolder.php" method="post" enctype="multipart/form-data">
    <input type="file" name="Fileimage" id="fileofimage">
    <input type="submit" value="Upload a file" name="buttclick">
</form>

</body>
</html>