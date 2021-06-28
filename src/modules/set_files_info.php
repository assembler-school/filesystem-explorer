<!-- For each file or directory on the current folder -->
<?php for ($i = 2; $i < count($filesDir); $i++) : ?>
  <tr>
    <!-- Icon/url depending of the type of file -->
    <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
      <td class="file-name col col-4" scope="row"><a class="folder-name" href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i]) ?>"><?php echo $filesDir[$i]; ?></a></td>
    <?php else : ?>
      <td class="file-name col col-4" scope="row"><?php echo $filesDir[$i]; ?></td>
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
<?php endfor ?>