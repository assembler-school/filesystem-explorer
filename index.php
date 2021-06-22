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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>48mb</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>48mb</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>48mb</td>
    </tr>
    
  </tbody>
</table>
    </main>
    <aside class="aside_left">
      <button class="new_fileBtn">+ New</button>
    </aside>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>