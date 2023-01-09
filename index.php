<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - File System Explorer</title>
    <link rel="stylesheet" href="./assets/css/index.css?v=<?php echo time(); ?>">
    <script src="assets/js/index.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <!-- <img src="ouricon" alt="icon" /> -->
            <p>LOGO</p>
            <input type="text" placeholder="search" name="search" />
        </nav>
    </header>

    <main>
        <?php
        require_once('./modules/getFilesAndFolders.php');
        getFilesAndFolders('./root');
        ?>
    </main>

    <aside>
        <?php
        require_once('./modules/getFileInfo.php');
        getFileInfo()
        ?>
    </aside>
</body>

</html>