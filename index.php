<?php
$myPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
$rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
echo $myPath;
echo "<br/>";

// Getting last folder
$lastFolder = basename($myPath);
echo $lastFolder;
echo "<br/>";

// Adding path
$pathAdded = "/firstPath";
$myPath .= $pathAdded;
echo $myPath;
echo "<br/>";

// Creating directory
mkdir($myPath, 0700);

// Removing directory
rmdir($myPath);

// is_dir
if (is_dir($myPath)) {
  echo "Existe el directorio";
}
echo "<br/>";

// Getting files and folders from directory
$myDir = scandir($rootPath);
print_r($myDir);



?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Manager</title>
  <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <form class="form-login row" action="./src/creatingFolder.php" method="POST">
    <div class="col col-6">
      <input type="text" name="folderName" placeholder="Folder name" id="folderName" class="form-control">
    </div>
    <div class="col col-6">
      <button class="btn btn-primary" type="submit">New Folder</button>
    </div>
  </form>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>