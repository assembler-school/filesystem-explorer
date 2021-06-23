<?php
require("./modules/database/allFilesDb.php");
// unset($_SESSION);
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dependencies -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="./assets/styles/styles.css">
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
            </div>
            <div class="col col-6 bottom-block central">
                <?php
                require_once("./modules/directoryFiles.php");
                ?>
            </div>
            <div class="col col-4 bottom-block sidebar-right">
            </div>
        </div>
    </main>

    <div class="drop-wrapper d-flex justify-content-center align-items-center">
        <h4>Drop me a file</h4>
    </div>
</body>

</html>