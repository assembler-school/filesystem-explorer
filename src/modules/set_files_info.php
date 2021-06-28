<!-- For each file or directory on the current folder -->
<?php for ($i = 2; $i < count($filesDir); $i++) : ?>
  <tr>
    <!-- Icon/url depending of the type of file -->
    <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
      <td class="file-name col col-4" scope="row"><a class="folder-name" href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i]) ?>">
          <?php
          echo "<i class='far fa-folder-open'></i> ";
          echo $filesDir[$i];
          ?>
        </a></td>
    <?php else : ?>
      <td class="file-name col col-4" scope="row">
        <?php
        $fileExtension = pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"];
        switch ($fileExtension) {
          case "txt":
            echo "<i class='far fa-file-alt'></i> ";
            break;
          case "doc":
            echo "<i class='far fa-file-alt'></i> ";
            break;
          case "odt":
            echo "<i class='far fa-file-alt'></i> ";
            break;
          case "jpg":
            echo "<i class='far fa-file-image'></i> ";
            break;
          case "png":
            echo "<i class='far fa-file-image'></i> ";
            break;
          case "svg":
            echo "<i class='far fa-file-image'></i> ";
            break;
          case "ppt":
            echo "<i class='far fa-file-powerpoint'></i> ";
            break;
          case "pdf":
            echo "<i class='far fa-file-pdf'></i> ";
            break;
          case "zip":
            echo "<i class='far fa-file-archive'></i> ";
            break;
          case "rar":
            echo "<i class='far fa-file-archive'></i> ";
            break;
          case "exe":
            echo "<i class='far fa-file-code'></i> ";
            break;
          case "html":
            echo "<i class='far fa-file-code'></i> ";
            break;
          case "js":
            echo "<i class='fab fa-js'></i> ";
            break;
          case "css":
            echo "<i class='far fa-file-code'></i> ";
            break;
          case "mp3":
            echo "<i class='far fa-file-audio'></i> ";
            break;
          case "mp4":
            echo "<i class='far far fa-file-video'></i> ";
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
    <td class="col col-2"><?php
                          if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
                            echo (pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"]);
                          }
                          ?></td>
    <!-- The file size -->
    <td class="col col-2"><?php
                          if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
                            echo (filesize($_SESSION["currentPath"] . "/" . $filesDir[$i]));
                          }
                          ?></td>
  </tr>
  <!--
    folder: <i class="far fa-folder-open"></i>
    doc: <i class="far fa-file-alt"></i>
    txt: <i class="far fa-file-alt"></i>
    odt: <i class="far fa-file-alt"></i>
    csv: <i class="fas fa-file-csv"></i>
    jpg: <i class="far fa-file-image"></i>
    png: <i class="far fa-file-image"></i>
    svg: <i class="far fa-file-image"></i>

    ppt: <i class="fas fa-file-powerpoint"></i>

    pdf: <i class="far fa-file-pdf"></i>

    zip: <i class="far fa-file-archive"></i>
    rar: <i class="far fa-file-archive"></i>
    exe: <i class="far fa-file-code"></i>
    mp3: <i class="far fa-file-audio"></i>
    mp4: <i class="far fa-file-video"></i>

    -->
<?php endfor ?>