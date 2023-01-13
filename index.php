<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - File System Explorer</title>
    <link rel="stylesheet" href="./assets/css/index.css?v=<?php echo time(); ?>">
    <script src="assets/js/index.js?v=<?php echo time(); ?>" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body oncontextmenu="return false;">
    <header>
        <nav>
            <p>FILESYSTEM <span>X</span>-PLORER</p>
            <p>SIZE / TOTAL SIZE</p>
            <input type="text" placeholder="search" name="search" />
        </nav>
    </header>

    <main>
        <?php

        session_start();

        if (!isset($_SESSION['curr_path'])) {
            $_SESSION['curr_path'] = './root';
        }

        require_once('./modules/getFilesAndFolders.php');

        // breadcrumbs and handle navigation

        if (isset($_SESSION['curr_path'])) {
            $breadCrumbs = explode("/", $_SESSION['curr_path']);

            $initialRoute = '';

            echo "<div class='bread-crumbs-container'>";
            foreach ($breadCrumbs as $path) {
                $initialRoute = $initialRoute . $path . "/";
                echo "<a onclick=(navigateToFolder(event)) path='$initialRoute'>$path</a>";
            }
            echo "</div>";

            getFilesAndFolders($_SESSION['curr_path']);
        } else {
            echo "<div class='bread-crumbs-container'>";
            echo '<p>./root</p>';
            echo "</div>";
            getFilesAndFolders('./root');
        }

        // breadcrumbs and handle navigation
        ?>
    </main>

    <aside class="details-container">
        <?php require_once('./modules/getInitialInfo.php'); ?>
        <!-- <div class='file-details-container'>
            <div class='file-details-container-items'>
                <p class='file-details-item'>Name</p>
                <p id="info-name" class='file-details-item'>$name</p>
                <p class='file-details-item'>Extension</p>
                <p id="info-type" class='file-details-item'>$type</p>
                <p class='file-details-item'>Size</p>
                <p id="info-size" class='file-details-item'>$size</p>
                <p class='file-details-item'>Last update</p>
                <p id="info-update" class='file-details-item'>$lastUpdateDate</p>
                <p class='file-details-item'>Created</p>
                <p id="info-creation" class='file-details-item'>$creationDate</p>
            </div>
        </div> -->
    </aside>

    <div class="confirmationModal hidden" id="confirmationModal">
        <p>Are you sure?</p>
        <div class="confirmation-btn-container">
            <img id="checkBtn" src="./assets/fileIcons/checkIcon.png" alt="check" />
            <img id="dismissBtn" src="./assets/fileIcons/dismissIcon.png" alt="dismiss" />
        </div>
    </div>

    <aside class="menu hidden">
        <img src="./assets/fileIcons/renameIcon.png" id="rename-btn" />
        <img src="./assets/fileIcons/infoIcon.png" id="infoBtn" />
        <img src="./assets/fileIcons/cutIcon.png" id="cut-btn" />
        <img src="./assets/fileIcons/deleteIcon.png" id="delete-btn" />
    </aside>

    <form id="upload-form">
        <input class="hidden" type="file" id="upload-input" />
    </form>
</body>

</html>