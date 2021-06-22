<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Manager</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
<main class="main_container">
  <div class="top_container">
  <form class="form-inline search_bar">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 search_btn" type="submit">Search</button>
     </form>
     <div class="current_path"></div>
</div>  

    <table class="table">
  <thead>
    <tr>
      <th scope="col">File name</th>
      <th scope="col">Creation date</th>
      <th scope="col">Modified date</th>
      <th scope="col">Extension</th>
      <th scope="col">Size</th>
    </tr>
  </thead>
  <tbody>
<?php
require("./upload.php")
?>
   
  </tbody>
</table>
    </main>
    <aside class="aside_left">
      <form action="index.php" method="POST" enctype="multipart/form-data">
      <input  type="file" name="file"> <br>
      <input class="new_fileBtn" type="submit" value="upload">
      </form>
    </aside>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>