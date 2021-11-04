<?php
if (!is_dir("root")) {
    mkdir("root", 0777, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileSystem-Explorer</title>
    <link rel="stylesheet" href="./assets/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css" type="text/css" media="all">
    <script src="/js/functions.js?v=<?php echo time(); ?>"></script>

</head>

<body>
    <header>
        <?php require_once("./search.php"); ?>
        <?php require_once("./directory.php"); ?>
        <?php require_once("./createFolderForm.php"); ?>


    </header>
    <main>
        <?php require_once("./sideBar.php"); ?>
        <section class="file__container">
            <?php require_once("./renderFiles.php") ?>
        </section>
    </main>
</body>

</html>