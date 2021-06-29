<a class="current-path" href="src/modules/updating_path.php?updatedPath=<?php echo $rootPath ?>">root /</a>
<!-- Loop to complete the navbar with the differents folders -->
<?php
$expPath = explode("/", $_SESSION["currentPath"]);
$startIndexNavbar = array_search("root", $expPath, true) + 1;
$folderHref = "";
for ($i = $startIndexNavbar; $i < count($expPath); $i++) : ?>
  <?php
  $folderHref .= "/" . $expPath[$i];
  ?>
  <a class="current-path" href="src/modules/updating_path.php?updatedPath=<?php echo $rootPath ?><?php echo $folderHref ?>"><?php echo $expPath[$i] ?> /</a>
<?php endfor ?>