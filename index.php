<?php
session_start();
include_once("./modules/upload.php");
include_once("./templates/modals.php");
include_once("./modules/directory-tree.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filesystem Explorer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand w-70">
                <h1>LOGO</h1>
            </a>

            <form class="d-flex" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark aside-bar">

                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <form action="" method="POST" enctype="multipart/form-data" class="d-flex">

                        <label class="custom-file-upload d-flex align-items-center me-md-auto text-white text-decoration-none border border-info p-2 rounded-3 sideButtons mb-2">
                            <input type="file" class="form-control file-select bg-dark text-light" name="file" onchange="form.submit()" style="display:none" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z" />
                            </svg><span class="fs-5 d-none d-sm-inline m-1 side-span">Upload</span>
                        </label>
                    </form>
                    <a href="./index.php" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none border border-info p-2 rounded-3 sideButtons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg> <span class="fs-5 d-none d-sm-inline m-1 side-span">New</span>
                    </a>
                    <?php directoryTree() ?>
                    <hr>
                </div>
            </div>
            <div class="p-0 main-table">
                <?php
                if (isset($success_msg) && $success_msg) {
                    echo "<div class='alert alert-success' role='alert'>";
                    echo
                    $_FILES["file"]["name"] . " " . $success_msg;
                    echo "</div>";
                    $success_msg = false;
                } elseif (isset($invalid_msg) && $invalid_msg) {
                    echo "<div class='alert alert-warning' role='alert'>";
                    echo $_FILES["file"]["name"] . " " . $invalid_msg;
                    echo "</div>";
                    $invalid_msg = false;
                } elseif (isset($error_msg) && $error_msg) {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo $error_msg;
                    echo "</div>";
                    $error_msg = false;
                } else {
                    echo NULL;
                }
                ?>
                <table class="table table-light table-borderless">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">size</th>
                            <th scope="col">modified</th>
                            <th scope="col">created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "./modules/search.php";
                        include_once "./modules/up-folder-list.php";
                        include_once "./modules/directory-list.php"; // Have to be cautious, this file changes current working directory
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php
deleteFileModal();
renameFileModal();
deleteFolderModal();
renameFolderModal();
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="./assets/js/script.js"></script>

</html>