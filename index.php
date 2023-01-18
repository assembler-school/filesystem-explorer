<?php
session_start();

require_once("CRUD/create.php");
require_once("CRUD/delete.php");
require_once("CRUD/element-info.php");
require_once("CRUD/edit.php");
require_once("CRUD/upload.php");
require_once( "CRUD/showSidebar.php");
require_once( "CRUD/showContent.php");

$folderEstructure = './root';

if(isset($_REQUEST['route'])){  
        $_SESSION["absPath"] = $_REQUEST['route'];
        $_SESSION["altPath"] = $_REQUEST['route'];
       
}else{
    $_SESSION["altPath"] = '';
    $_SESSION["absPath"] = 'root';
}

$absolutPath = $_SESSION["absPath"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js?v=<?php echo time(); ?>" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css?v=<?php echo (rand()); ?>">
</head>

<body>
    <!-- Sidebar -->
    <section class="d-flex container-fluid" id="container-all">
        <div class="sidebar-heading" id="sidebar">
            <div class="row">
                <div class="col-mad-12 logo">
                    <img src="assets/icons/open-folder.png" alt="">
                    <a href="index.php">
                        <h1>Root</h1>
                    </a>
                </div>
                <div class="list-group list-group-flush">
                    <?php 
                     viewFolderStructure($root);
                    ?>
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <div class="container-fluid" id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="col-md-8 d-flex justify-content-between">
                        <div>
                            <!-- input Modal -->
                            <input type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Create"
                                class="open-modal">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">New folder</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" target="" class="create-form" action="index.php">
                                            <div class="modal-body text-center">
                                                <input type="text" size="25" placeholder="Folder name"
                                                    name="name-folder" class="nameFolder">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="enviar" value="Save changes" class="refresh">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form enctype="multipart/form-data" method="POST" action="index.php">
                                <div class="file-form">
                                    <div class="input-file"><input type="file" name="nombre"></div>
                                    <!-- <input type="file" name="nombre"> -->
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                    <input type="submit" value="Upload" class="submit-upload" name="enviar2">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <form method="post">
                            <input type="text" name="name-search" placeholder="Search..." class="search">
                            <input type="submit" value="Search" name="search" class="btn-search">
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Container Elements -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mt-5">
                        <div class="row">
                            <?php viewElements($absolutPath);?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5" id="infoArchive">
                        <div class="row edit-delete">
                            <div class="col-md-2 delete">
                                <form action="index.php" method="post">
                                    <input type="submit" value="borrar" name="delete" class="open-modal edit"><span><img
                                            src="assets/icons/delete.png" alt="" class="icon-delete"></span>
                                </form>
                            </div>



                            <div class="col-md-2">
                                <input type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                    class="open-modal edit"><span><img src="assets/icons/edit.png" alt="icon-delete"
                                        class="icon-delete"></span>

                                <div class="modal fade" id="exampleModal2" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Rename</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" target="" class="create-form" action="index.php">
                                                <div class="modal-body text-center">
                                                    <input type="text" size="25" placeholder="Rename" name="edit"
                                                        class="nameFolder">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="btn-edit" value="Save" class="refresh" name="btn-rename">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div>
                        <?php  
                            if (str_contains($_SESSION["absPath"], ".")) {
                                showFileInfo($absolutPath);
                            }else {
                                showFolderInfo($absolutPath);
                            }
                        ?>
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>