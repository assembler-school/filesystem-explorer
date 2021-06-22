<?php
session_start();
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
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>File System</title>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <main class="d-flex flex-column justify-content-center m-0 mb-4">
        <div class="row header m-0"></div>
        <div class="row bottom m-0">
            <div class="col col-2 sidebar-left">
            </div>
            <div class="col col-6 central">
                <?php
                require_once("./modules/directoryFiles.php");
                ?>
            </div>
            <div class="col col-4 sidebar-right">
            </div>
        </div>
    </main>

    <div class="drop-wrapper">
    </div>
</body>

</html>