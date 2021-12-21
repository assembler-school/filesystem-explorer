<!DOCTYPE html>
<html lang="en">
<?php
require("./modules/functions.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/nav-sidebar.css">
    <link rel="stylesheet" href="./assets/css/modals.css">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
    <script src="modules\index.js" defer></script>
</head>

<body>
    <section class="navbarUrl">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img class="LogoNav" src="./assets/img/logo.png" alt="">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        <a class="nav-link" href="#">Orders</a>
                        <a class="nav-link" href="#">Products</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Customers</a>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <button class="btnLogin">Login</button>
                            <button type="button" class="btn btn-warning">Sign-up</button>
                            <img class="UserIcon" src="./assets/img/usuario.png" alt="">
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation url -->
        <nav>
            <ol class="breadcrumb">
                <?php
                $path = false;
                if (isset($_GET["path"])) {
                    $path = $_GET["path"];
                }
                breadcrumb($path);
                ?>
                <i class="fas fa-info-circle fa-lg" style="color:black;" id="infoCircle"></i>
            </ol>
        </nav>
    </section>
    <section class="container">
        <!-- Here commes the directories -->
        <div class="sibeBar">
            <div class="side-bar">
                <div class="menu">
                    <div class="options">
                        <button id="btnCreate" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">NEW FILE</button>
                        <!-- FORM TO UPLOAD FILES -->
                        <form method="post" action="./modules/uploadFile.php" enctype="multipart/form-data">
                            <label for="upload" class="btn btn-warning">
                                <i class="fas fa-file-upload fa-2x"></i>
                                <input type="text" name="path" value='<?php echo $path ?>' style="display:none;">
                                <input type="file" name="uploadedFile" style="display:none;" id="upload" onchange="this.form.submit();" accept=".doc,.csv,.jpg,.png,.txt,.ppt,.odt,.pdf,.zip,.rar,.exe,.svg,.mp3,.mp4">
                            </label>
                        </form>
                    </div>
                    <div class="item"><a class="sub-btn"><i class="fa fa-file-code-o"></i>My files</a>
                        <div class="sub-menu">
                            <?php
                            folderSideBar();
                            ?>
                        </div>
                    </div>
                    <div class="item"><a href="#"><i class="fa fa-cog"></i>Settings</a></div>
                    <div class="item"><a href="./modules/trash.php"><i class="fas fa-trash"></i>Trash</a></div>
                </div>
            </div>
        </div>
        <!--MODAL FOR CREAR FOLDERS-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($_POST["Create_File"])) {
                            mkdir($_POST["file_name"],);
                        }
                        ?>
                        <form method="post" action="./modules/create.php" id="create_form">
                            <input type="text" name="file_name">
                            <input type="text" name="path" value='<?php echo $path ?>' style="display:none;">
                            <input type="submit" value="Create_File" name="create_file">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL EDIT-->
        <div class="modal" tabindex="-1" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="file_name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <!-- Main has to be a grid or flexbox responsive with cols and rows of bootstrap -->
        <main class="container">
            <!-- Cada section sera un fichero diferente que carga -->
            <article class="row">
                <section class="col-4">
                    <?php
                    loadFiles();
                    ?>
                    </div>
                </section>
            </article>
        </main>
    </section>
</body>

</html>