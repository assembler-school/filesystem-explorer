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
            <p>SIZE/TOTAL SIZE</p>
            <input type="text" placeholder="search" name="search" />
        </nav>
    </header>

    <main>
        <?php

        session_start();
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
        <?php
        require_once('./modules/getFileInfo.php');
        getFileInfo()
        ?>
    </aside>

    <aside class="menu hidden">
        <img src="./assets/fileIcons/renameIcon.png" id="rename-btn" />
        <img src="./assets/fileIcons/copyIcon.png" id="copy-btn" />
        <img src="./assets/fileIcons/cutIcon.png" id="cut-btn" />
        <img src="./assets/fileIcons/deleteIcon.png" id="delete-btn" />
    </aside>
</body>

</html>