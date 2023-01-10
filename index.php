<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script defer src="https://kit.fontawesome.com/474cc18125.js" crossorigin="anonymous"></script>
    <title>File Explorer</title>
</head>

<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">File Explorer</a>
      <form class="d-flex" role="search">

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <input class="form-control me-2 create-text" type="search" placeholder="File name to create..." aria-label="Search">
        <button class="btn btn-secondary" type="submit">Upload</button>
        <button class="btn btn-success submit" type="submit">Submit</button>

      </form>
    </div>
  </div>
</nav>
</header>

<body>
<table class="table caption-top">
  <caption>Files & folders</caption>
  <thead>
    <tr>
      <th scope="col">Extension</th>
      <th scope="col">Name</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Last Modified</th>
      <th scope="col">Size</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark.php</td>
      <td>23-2-2021</td>
      <td>25-3-2022</td>
      <td>234</td>
      <td><i class="fa-solid fa-trash"></i><i class="fa-regular fa-pen-to-square"></i></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob.html</td>
      <td>24-5-2021</td>
      <td>25-5-2021</td>
      <td>2345</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>30-4-2022</td>
      <td>5-5-2022</td>
      <td>23242324</td>
    </tr>
  </tbody>
</table>
    
</body>

</html>