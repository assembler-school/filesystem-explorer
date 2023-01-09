<?php
require_once('./htmlTags.php');
require_once('./LoadApp.php');
define("ROOT_PATH", "./root");
?>

<?php getHeader(); ?>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand ms-3 text-white" href="#"><i class="bi bi-house"></i></a>
      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
            <li class="breadcrumb-item text-white"><a href="#">Library</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Data</li>
          </ol>
        </nav>
      </div>
      <form class="d-flex me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </nav>
  </header>
  <article class="container-fluid mt-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="tbody">
          <?php loadFiles(); ?>
      </tbody>
    </table>
  </article>
  <?php getFooter(); ?>
</body>

</html>