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
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
                <i class="fas fa-info-circle fa-2x" id="infoCircle"></i>
            </ol>
        </nav>
    </section>
    <section class="container">
        <!-- Here commes the directories -->
        <div class="sibeBar">
            <div class="side-bar">
                <div class="menu">
                <?php 
		if(isset($_POST["Create_File"])){
			mkdir($_POST["file_name"],);
		}
	?>
    <form method="post" action="./modules/create.php" id="create_form">
 <input type="text" name="file_name">
 <input type="submit" value="Create_File" name="create_file">
</form>
                    <!-- <button id="btnCreate" class="btn btn-warning" method="POST" action="./root" value="Create_File" name="create_file"><a href="">NEW FILE</a></button> -->
                    <div class="item"><a class="sub-btn"><i class="fa fa-file-code-o"></i>My file</a>
                        <div class="sub-menu">
                            <a href="index.php?infolder=2" class="sub-item"><i class="fas fa-music"></i>My music</a>
                            <a href="index.php?infolder=3" class="sub-item"><i class="fa fa-video-camera"></i>My videos</a>
                            <a href="index.php?infolder=4" class="sub-item"><i class="fa fa-book"></i>My books</a>
                            <a href="index.php?infolder=5" class="sub-item"><i class="fa fa-picture-o"></i>Photos</a>
                        </div>
                    </div>
                    <div class="item"><a href="#"><i class="fa fa-cog"></i>Settings</a></div>
                    <div class="item"><a href="./modules/trash.php"><i class="fas fa-trash"></i>Trash</a></div>
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