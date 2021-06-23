<!-- For each file or directory on the current folder -->
<?php for ($i = 2; $i < count($filesDir); $i++) : ?>
  <tr>
    <!-- Icon/url depending of the type of file -->
    <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
      <th scope="row"><a href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i]) ?>"><?php echo $filesDir[$i]; ?></a></th>
    <?php else : ?>
      <th scope="row"><?php echo $filesDir[$i]; ?></th>
    <?php endif ?>
    <!-- Creation date -->
    <td><?php echo (date("d-m-Y H:i", filectime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
    <!-- Las modification date -->
    <td><?php echo (date("d-m-Y H:i", filemtime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
    <!-- The file extension if it is not a folder -->
    <td><?php
        if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
          echo (pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"]);
        }
        ?></td>
    <!-- The file size -->
    <td><?php
        if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
          echo (filesize($_SESSION["currentPath"] . "/" . $filesDir[$i]));
        }
        ?></td>
  </tr>
<?php endfor ?>