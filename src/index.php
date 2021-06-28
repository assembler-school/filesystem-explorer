<?php
require("./modules/database/allFilesDb.php");
// unset($_SESSION);
// session_destroy();

?>

<!DOCTYPE html>
<html lang="en-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Dependencies -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

            var recipient = button.getAttribute('delete')

            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.value = recipient
        })
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>File System</title>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <main class="d-flex flex-column justify-content-center m-0 mb-4">
        <!-- HEADER -->
        <div class="header m-0 p-2 d-flex justify-content-between align-items-center">
            <h2 class="logo m-0">Hello</h2>
            <input type="text" class="pl-3 search-bar"></input>
            <button type="button" class="btn btn-primary ajax-test">Primary</button>
            <div class="top-buttons">

                <form action="./modules/uploadFileDb.php" method="POST" enctype="multipart/form-data">
                    <label class="custom-upload">
                        <input value="New file" type="file" name="uploadedFile" class="btn btn-light" />
                        <div class="btn btn-outline-dark">Choose file</div>
                    </label>
                    <input value="Upload" type="submit" class="btn btn-dark" />
                </form>
            </div>
        </div>
        <!-- BOTTOM -->
        <div class="row bottom m-0">
            <div class="col col-2 bottom-block sidebar-left">
                <?php
                require_once("./modules/allDirectories.php");
                ?>
            </div>
            <div class="col col-7 p-4 bottom-block central">
                <?php
                require_once("./modules/directoryFiles.php");

                ?>

                <button type="submit" name="new_name" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="delete">TESTEDIT</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="directoryFiles">TESTDELETE</button>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="directoryFiles">TESTDOWNLOAD</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rename this file</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">New file name:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Accept changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-3 bottom-block sidebar-right">
            </div>
        </div>
    </main>

    <div class="drop-wrapper d-flex justify-content-center align-items-center">
        <h4>Drop me a file</h4>
    </div>
</body>

</html>