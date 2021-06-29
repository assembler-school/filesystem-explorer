<?php
session_start();
include_once("./modules/upload.php");
include_once("./templates/modals.php");
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
                <div class="logoContainer"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="70px" viewBox="0 0 99.34 99.339" style="enable-background:new 0 0 99.34 99.339;" xml:space="preserve" fill="#048A81">
                        <g>
                            <g>
                                <path d="M79.447,30.25c-0.701-0.058-1.346-0.416-1.764-0.982C73.637,23.784,67.135,20.4,60.213,20.4
			c-0.441,0-0.884,0.014-1.326,0.041c-0.582,0.035-1.153-0.138-1.619-0.489c-4.211-3.184-9.314-4.908-14.66-4.908
			c-9.572,0-18.068,5.554-22.026,13.96c-0.352,0.746-1.057,1.264-1.874,1.377C8.153,31.844,0,40.927,0,51.877
			c0,11.966,9.735,21.7,21.701,21.7h4.658v10.718h0.045H67.19l12.575-28.854c0.324-0.742,0.252-1.597-0.192-2.273
			c-0.442-0.678-1.199-1.086-2.009-1.086H64.335c-0.786,0-1.524,0.386-1.973,1.031l-3.112,4.484H42.311
			c-2.493,0-4.75,1.471-5.757,3.749l-4.851,10.968v-7.285H21.701c-7.252,0-13.151-5.899-13.151-13.15
			c0-7.252,5.899-13.152,13.151-13.152c0.366,0,0.726,0.029,1.085,0.059c2.089,0.163,3.982-1.193,4.49-3.221
			c1.769-7.047,8.073-11.97,15.331-11.97c4.146,0,8.071,1.603,11.05,4.51c1.019,0.993,2.464,1.417,3.858,1.127
			c0.887-0.187,1.793-0.28,2.697-0.28c5.077,0,9.611,2.855,11.832,7.45c0.781,1.616,2.488,2.576,4.274,2.393
			c0.444-0.044,0.888-0.067,1.319-0.067c7.252,0,13.151,5.9,13.151,13.152c0,6.312-4.472,11.596-10.414,12.858l-3.853,8.842h1.115
			c11.965,0,21.701-9.734,21.701-21.7C99.342,40.52,90.571,31.172,79.447,30.25z" fill="white" />
                                <path d="M57.969,42.055c1.771,0,3.207-1.436,3.207-3.206c0-1.771-1.437-3.207-3.207-3.207H41.372c-1.77,0-3.207,1.436-3.207,3.207
			s1.437,3.206,3.207,3.206H57.969z" />
                                <path d="M33.89,47.518c0,1.771,1.436,3.206,3.207,3.206h25.146c1.771,0,3.207-1.436,3.207-3.206c0-1.771-1.435-3.207-3.207-3.207
			H37.097C35.326,44.311,33.89,45.746,33.89,47.518z" />
                            </g>
                        </g>
                    </svg></div>
            </a>

            <form class="d-flex" method="POST">
                <input class="form-control me-2 searchBox" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn searchButton" type="submit" name="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark aside-bar">

                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <form action="" method="POST" enctype="multipart/form-data" class="d-flex">

                        <label class="custom-file-upload d-flex align-items-center me-md-auto text-white text-decoration-none p-2 rounded-3 mb-2 sideButtons" role="button">
                            <input type="file" class="form-control file-select bg-dark text-light" name="file" onchange="form.submit()" style="display:none" />
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#048A81" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z" />
                            </svg><span class="fs-5 d-none d-sm-inline m-1 side-span pe-auto">UPLOAD</span>
                        </label>
                    </form>
                    <a href="./index.php" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none p-2 rounded-3 sideButtons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="#048A81" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg> <span class="fs-5 d-none d-sm-inline m-1 side-span ml-2">NEW</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white" id="menu">
                        <li class="nav-item">
                            <a href="#menu1" data-bs-toggle="collapse" class="nav-link align-middle px-0 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                    <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                </svg> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                            <ul class="collapse show nav flex-column ms-1" id="menu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#sub1" data-bs-toggle="collapse" class="nav-link px-0 text-white"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                        </svg> <span class="ms-1 d-none d-sm-inline">Music</span></a>
                                    <ul class="collapse show nav flex-column ms-1" id="sub1" data-bs-parent="#menu1">
                                        <li class="w-100">
                                            <a href="#" class="nav-link px-0 text-light"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                                    <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                                </svg> <span class="d-none d-sm-inline">Pop</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link px-0 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                                    <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                                </svg> <span class="d-none d-sm-inline">Rock</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-white"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                                        </svg> <span class="ms-1 d-none d-sm-inline">Photos</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                    <thead class="table tableHead">
                        <tr class="text-center">
                            <th scope=" col">
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Modified</th>
                            <th scope="col">Created</th>
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