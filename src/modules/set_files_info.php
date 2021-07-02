<?php
// Getting path from root/
$rootRelativePath = getRootRelativePath($_SESSION["currentPath"]);
?>

<!-- Rendering current directory files -->
<?php if (!isset($_SESSION["searchFiles"])) : ?>
  <!-- For each file or directory on the current folder -->
  <?php foreach ($filesDir as $file) : ?>
    <tr>
      <!-- Icon/url depending of the type of file -->
      <!-- Pictures/videos/audios have link to open media modal -->
      <?php if (is_dir($_SESSION["currentPath"] . "/" . $file)) : ?>
        <td class="file-name col col-3" scope="row"><a class="folder-name" href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $file) ?>">
            <?php
            echo "<i class='fileIcon far fa-folder-open'></i> ";
            echo $file;
            ?>
          </a></td>
      <?php else : ?>
        <td class="file-name col col-3" scope="row">
          <?php
          $fileExtension = pathinfo($_SESSION["currentPath"] . "/" . $file)["extension"];
          switch ($fileExtension) {
            case "txt":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $file;
              break;
            case "doc":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $file;
              break;
            case "odt":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $file;
              break;
            case "jpg":
              echo "<i class='fileIcon far fa-file-image'></i> ";
          ?>
              <a data-img="<?php echo ($rootRelativePath . $file) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $file; ?></a>
            <?php
              break;
            case "png":
              echo "<i class='fileIcon far fa-file-image'></i> ";
            ?>
              <a data-img="<?php echo ($rootRelativePath . $file) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $file; ?></a>
            <?php
              break;
            case "svg":
              echo "<i class='fileIcon far fa-file-image'></i> ";
            ?>
              <a data-img="<?php echo ($rootRelativePath . $file) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $file; ?></a>
            <?php
              break;
            case "ppt":
              echo "<i class='fileIcon far fa-file-powerpoint'></i> ";
              echo $file;
              break;
            case "pdf":
              echo "<i class='fileIcon far fa-file-pdf'></i> ";
              echo $file;
              break;
            case "zip":
              echo "<i class='fileIcon far fa-file-archive'></i> ";
              echo $file;
              break;
            case "rar":
              echo "<i class='fileIcon far fa-file-archive'></i> ";
              echo $file;
              break;
            case "exe":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $file;
              break;
            case "html":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $file;
              break;
            case "js":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $file;
              break;
            case "css":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $file;
              break;
            case "mp3":
              echo "<i class='fileIcon far fa-file-audio'></i> ";
            ?>
              <a data-audio="<?php echo ($rootRelativePath . $file) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#audioModal'><?php echo $file; ?></a>
            <?php
              break;
            case "mp4":
              echo "<i class='fileIcon far far fa-file-video'></i> ";
            ?>
              <a data-video="<?php echo ($rootRelativePath . $file) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#videoModal'><?php echo $file; ?></a>
          <?php
              break;
          }
          ?>
        </td>
      <?php endif ?>
      <!-- Creation date -->
      <td class="col col-2"><?php echo (date("d-m-Y H:i", filectime($_SESSION["currentPath"] . "/" . $file))); ?></td>
      <!-- Las modification date -->
      <td class="col col-2"><?php echo (date("d-m-Y H:i", filemtime($_SESSION["currentPath"] . "/" . $file))); ?></td>
      <!-- The file extension if it is not a folder -->
      <td class="col col-1"><?php
                            if (!is_dir($_SESSION["currentPath"] . "/" . $file)) {
                              echo (pathinfo($_SESSION["currentPath"] . "/" . $file)["extension"]);
                            }
                            ?></td>
      <!-- The file size -->
      <td class="col col-2"><?php
                            if (!is_dir($_SESSION["currentPath"] . "/" . $file)) {
                              if (filesize($_SESSION["currentPath"] . "/" . $file) < 1000000) {
                                echo (number_format((filesize($_SESSION["currentPath"] . "/" . $file)) / 1000, 2));
                                echo " kB";
                              } else {
                                echo (number_format((filesize($_SESSION["currentPath"] . "/" . $file)) / 1000000, 2));
                                echo " MB";
                              }
                            }
                            ?></td>
      <!-- Setting icons for renaming and deleting -->
      <?php if (is_dir($_SESSION["currentPath"] . "/" . $file)) : ?>
        <td class="col col-2">
          <button data-delete="<?php echo ($_SESSION["currentPath"] . "/" . $file) ?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
            <i class="fas fa-trash-alt"></i>
          </button>
          <button data-edit="<?php echo ($_SESSION["currentPath"] . "/" . $file) ?>" type="button" class="btn btn-edit-file" data-bs-toggle="modal" data-bs-target="#renameFolderModal">
            <i class="fas fa-edit"></i></i>
          </button>
        </td>
      <?php else : ?>
        <td class="col col-2">
          <button data-delete="<?php echo ($_SESSION["currentPath"] . "/" . $file) ?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
            <i class="fas fa-trash-alt"></i>
          </button>
        </td>
      <?php endif ?>
    </tr>
  <?php endforeach ?>
<?php endif ?>


<!-- Rendering search result files -->
<?php if (isset($_SESSION["searchFiles"])) : ?>
  <!-- For each file searched -->
  <?php foreach ($_SESSION["searchFiles"] as $fileSearch) : ?>
    <tr>
      <!-- Icon/url depending of the type of file -->
      <!-- Pictures/videos/audios have link to open media modal -->
      <?php if (is_dir($fileSearch["filePath"])) : ?>
        <td class="file-name col col-3" scope="row"><a class="folder-name" href="src/modules/updating_path.php?updatedPath=<?php echo $fileSearch["filePath"] ?>">
            <?php
            echo "<i class='fileIcon far fa-folder-open'></i> ";
            echo $fileSearch["fileName"];
            ?>
          </a></td>
      <?php else : ?>
        <td class="file-name col col-3" scope="row">
          <?php
          $fileExtension = pathinfo($fileSearch["filePath"])["extension"];
          switch ($fileExtension) {
            case "txt":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "doc":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "odt":
              echo "<i class='fileIcon far fa-file-alt'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "jpg":
              echo "<i class='fileIcon far fa-file-image'></i> ";
          ?>
              <a data-img="<?php echo (substr(getRootRelativePath($fileSearch["filePath"]), 0, -1)) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $fileSearch["fileName"]; ?></a>
            <?php
              break;
            case "png":
              echo "<i class='fileIcon far fa-file-image'></i> ";
            ?>
              <a data-img="<?php echo (substr(getRootRelativePath($fileSearch["filePath"]), 0, -1)) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $fileSearch["fileName"]; ?></a>
            <?php
              break;
            case "svg":
              echo "<i class='fileIcon far fa-file-image'></i> ";
            ?>
              <a data-img="<?php echo (substr(getRootRelativePath($fileSearch["filePath"]), 0, -1)) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#imgModal'><?php echo $fileSearch["fileName"]; ?></a>
            <?php
              break;
            case "ppt":
              echo "<i class='fileIcon far fa-file-powerpoint'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "pdf":
              echo "<i class='fileIcon far fa-file-pdf'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "zip":
              echo "<i class='fileIcon far fa-file-archive'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "rar":
              echo "<i class='fileIcon far fa-file-archive'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "exe":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "html":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "js":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "css":
              echo "<i class='fileIcon far fa-file-code'></i> ";
              echo $fileSearch["fileName"];
              break;
            case "mp3":
              echo "<i class='fileIcon far fa-file-audio'></i> ";
            ?>
              <a data-audio="<?php echo (substr(getRootRelativePath($fileSearch["filePath"]), 0, -1)) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#audioModal'><?php echo $fileSearch["fileName"]; ?></a>
            <?php
              break;
            case "mp4":
              echo "<i class='fileIcon far far fa-file-video'></i> ";
            ?>
              <a data-video="<?php echo (substr(getRootRelativePath($fileSearch["filePath"]), 0, -1)) ?>" class='fileA' data-bs-toggle='modal' data-bs-target='#videoModal'><?php echo $fileSearch["fileName"]; ?></a>
          <?php
              break;
          }
          ?>
        </td>
      <?php endif ?>
      <!-- Creation date -->
      <td class="col col-2"><?php echo (date("d-m-Y H:i", filectime($fileSearch["filePath"]))); ?></td>
      <!-- Las modification date -->
      <td class="col col-2"><?php echo (date("d-m-Y H:i", filemtime($fileSearch["filePath"]))); ?></td>
      <!-- The file extension if it is not a folder -->
      <td class="col col-1"><?php
                            if (!is_dir($fileSearch["filePath"])) {
                              echo (pathinfo($fileSearch["filePath"])["extension"]);
                            }
                            ?></td>
      <!-- The file size -->
      <td class="col col-2"><?php
                            if (!is_dir($fileSearch["filePath"])) {
                              if (filesize($fileSearch["filePath"]) < 1000000) {
                                echo (number_format((filesize($fileSearch["filePath"])) / 1000, 2));
                                echo " kB";
                              } else {
                                echo (number_format((filesize($fileSearch["filePath"])) / 1000000, 2));
                                echo " MB";
                              }
                            }
                            ?></td>
      <!-- Setting icons for renaming and deleting -->
      <?php if (is_dir($fileSearch["filePath"])) : ?>
        <td class="col col-2">
          <button data-delete="<?php echo ($fileSearch["filePath"]) ?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
            <i class="fas fa-trash-alt"></i>
          </button>
          <button data-edit="<?php echo ($fileSearch["filePath"]) ?>" type="button" class="btn btn-edit-file" data-bs-toggle="modal" data-bs-target="#renameFolderModal">
            <i class="fas fa-edit"></i></i>
          </button>
        </td>
      <?php else : ?>
        <td class="col col-2">
          <button data-delete="<?php echo ($fileSearch["filePath"]) ?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
            <i class="fas fa-trash-alt"></i>
          </button>
        </td>
      <?php endif ?>
    </tr>
  <?php endforeach ?>
  <?php unset($_SESSION["searchFiles"]); ?>
<?php endif ?>