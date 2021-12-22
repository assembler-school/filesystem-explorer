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
    <script src="modules/index.js" defer></script>
</head>

<body>
    <section class="navbarUrl">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img class="LogoNav" src="./assets/img/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="index.php">Home</a>
                        <a class="nav-link" href="#">Orders</a>
                        <a class="nav-link" href="#">Products</a>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <button type="button" class="btn btn-warning" style="padding: 0px 30px; margin:17px 0px;">Login</button>
                            <button type="button" class="btn btn-warning" style="padding: 0px 30px; margin:17px 0px; ">Sign Up</button>
                            <a href="#">
                                <img class="UserIcon" src="./assets/img/dsBuffer.jpg" alt="">
                            </a>
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
            </ol>
        </nav>
    </section>
    <section class="container">
        <!-- Here commes the directories -->
        <div class="sibeBar">
            <div class="side-bar">
                <div class="menu">
                    <div class="options">
                        <button id="btnCreate" style="background-color: white; color: black;" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">NEW FOLDER</button>
                        <!-- FORM TO UPLOAD FILES -->
                        <form method="post" action="./modules/uploadFile.php" enctype="multipart/form-data">
                            <label for="upload" style="background-color: white; color: black; margin: 10px 5px 0px 0px; padding: 11.5px 30px" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-file-upload fa-2x"></i>
                                <input type="hidden" name="path" value='<?php echo $path ?>'>
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

        <!--MODAL FOR CREATE FOLDERS-->

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
                            <input type="hidden" name="path" value='<?php echo $path ?>'>
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
                        <form method="post" action="./modules/EditFolders.php" id="edit_form">
                            <input type="text" name="edit-name">
                            <input type="submit" value="Edit-Form" name="Edit-Form">
                        </form>
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

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deleting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form id="deleteForm" method="post" action="./modules/deleteFiles.php">
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Show Files -->
        <?php
        if (isset($_GET["visualize"])) {
            echo '<div id="modalFiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                            <button type="button" class="closing btn-close" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">';
            if ($_GET["format"] === "jpg" || $_GET["format"] === "png") {
                echo '<img src="' . $_GET["visualize"] . '">';
            } else if ($_GET["format"] === "mp4") {
                echo '<div>
                <iframe class="embed-responsive-item" src="' . $_GET["visualize"] . '" allowfullscreen></iframe>
              </div>';
            } else if ($_GET["format"] === "mp3") {
                echo '<div>
                <iframe class="embed-responsive-item" src="' . $_GET["visualize"] . '" allowfullscreen></iframe>
              </div>';
            }

            echo '</div>
                        <div class="modal-footer">
                            <button class="closing" type="button" class="btn btn-secondary">Close</button>
                        </div>
                    </div>
                </div>';
        };
        ?>
        <!-- OFF CANVAS INFORMATION -->
        <?php

        ?>
        <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="offcanvasRight">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <section id="i" class="navbar navbar-dark bg-primary flex-nowrap">
                    <table class="default">

                        <div class="navbar-collapse collapse w-100 justify-content-flex-start" id="navbar5">

                        </div>
                        <div class="w-100">
                            <div class="row p-3 border bg-light">Information</div>
                            <div class="row p-3 border bg-light">DETAILS</div>
                            <div class="row p-3 border bg-light">TYPE ONF FILE</div>
                            <div class="row p-3 border bg-light">
                                <div class="col">
                                    Creation date
                                </div>
                                <div class="col">
                                    21/12/2021
                                </div>
                                <div class="row p-3 border bg-light">
                                    <div class="col">
                                        Last Modified Date
                                    </div>
                                    <div class="col">
                                        21/12/2021
                                    </div>
                                </div>
                                <div class="row p-3 border bg-light">
                                    <div class="col">
                                        Size
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
</body>

</html>