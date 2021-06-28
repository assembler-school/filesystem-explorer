<!-- For each file or directory on the current folder -->
<?php for ($i = 2; $i < count($filesDir); $i++) : ?>
  <tr>
    <!-- Icon/url depending of the type of file -->
    <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
      <td class="file-name col col-3" scope="row"><a class="folder-name" href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i]) ?>">
          <?php
          echo "<i class='fileIcon far fa-folder-open'></i> ";
          echo $filesDir[$i];
          ?>
        </a></td>
    <?php else : ?>
      <td class="file-name col col-3" scope="row">
        <?php
        $fileExtension = pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"];
        switch ($fileExtension) {
          case "txt":
            echo "<i class='fileIcon far fa-file-alt'></i> ";
            break;
          case "doc":
            echo "<i class='fileIcon far fa-file-alt'></i> ";
            break;
          case "odt":
            echo "<i class='fileIcon far fa-file-alt'></i> ";
            break;
          case "jpg":
            echo "<i class='fileIcon far fa-file-image'></i> ";
            break;
          case "png":
            echo "<i class='fileIcon far fa-file-image'></i> ";
            break;
          case "svg":
            echo "<i class='fileIcon far fa-file-image'></i> ";
            break;
          case "ppt":
            echo "<i class='fileIcon far fa-file-powerpoint'></i> ";
            break;
          case "pdf":
            echo "<i class='fileIcon far fa-file-pdf'></i> ";
            break;
          case "zip":
            echo "<i class='fileIcon far fa-file-archive'></i> ";
            break;
          case "rar":
            echo "<i class='fileIcon far fa-file-archive'></i> ";
            break;
          case "exe":
            echo "<i class='fileIcon far fa-file-code'></i> ";
            break;
          case "html":
            echo "<i class='fileIcon far fa-file-code'></i> ";
            break;
          case "js":
            echo "<i class='fileIcon far fa-file-code'></i> ";
            break;
          case "css":
            echo "<i class='fileIcon far fa-file-code'></i> ";
            break;
          case "mp3":
            echo "<i class='fileIcon far fa-file-audio'></i> ";
            break;
          case "mp4":
            echo "<i class='fileIcon far far fa-file-video'></i> ";
            break;
        }
        echo $filesDir[$i];
        ?>
      </td>
    <?php endif ?>
    <!-- Creation date -->
    <td class="col col-2"><?php echo (date("d-m-Y H:i", filectime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
    <!-- Las modification date -->
    <td class="col col-2"><?php echo (date("d-m-Y H:i", filemtime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
    <!-- The file extension if it is not a folder -->
    <td class="col col-1"><?php
                          if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
                            echo (pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"]);
                          }
                          ?></td>
    <!-- The file size -->
    <td class="col col-2"><?php
                          if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
                            if (filesize($_SESSION["currentPath"] . "/" . $filesDir[$i]) < 1000) {
                              echo (filesize($_SESSION["currentPath"] . "/" . $filesDir[$i]));
                              echo " kB";
                            } else {
                              echo (number_format((filesize($_SESSION["currentPath"] . "/" . $filesDir[$i])) / 1000, 2));
                              echo " MB";
                            }
                          }
                          ?></td>
    <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
      <td>
        <button data-delete="<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i])?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
          <i class="fas fa-trash-alt"></i>
        </button>
        <button data-edit="<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i])?>" type="button" class="btn btn-edit-file" data-bs-toggle="modal" data-bs-target="#renameFolderModal">
          <i class="fas fa-edit"></i></i>
        </button>
      </td>
    <?php else : ?>
      <td>
        <button data-delete="<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i])?>" type="button" class="btn btn-delete-file" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
          <i class="fas fa-trash-alt"></i>
        </button>
      </td>
    <?php endif ?>
  </tr>
<?php endfor ?>