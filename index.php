<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileSystem-Explorer</title>
    <link rel="stylesheet" href="./assets/styles.css?v=<?php echo time(); ?>">
    <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
</head>

<body>
    <header>
        <?php require_once("./search.php"); ?>
        <?php require_once("./directory.php"); ?>

    </header>
    <main>
        <?php require_once("./sideBar.php"); ?>
        <div></div>
        <section class="file__container">


            <?php
            if (isset($_GET["directory"])) {
                $directory =  $_GET["directory"];
            } else {
                $directory = './root';
            }


            scandir($directory, SCANDIR_SORT_ASCENDING);
            if (is_dir($directory)) {
                if ($dh = opendir($directory)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($file === "." || $file === "..") {
                        } else
                            echo "<a href=?directory=" . $directory . "/" . $file . ">$file</a>";
                    }
                    closedir($dh);
                }
            }
            ?>
        </section>
    </main>
</body>

</html>