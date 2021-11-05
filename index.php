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
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css?v=<?php echo time(); ?>" type="text/css" media="all">
    <script src="/js/functions.js?v=<?php echo time(); ?>"></script>

</head>

<body class="text-center">
    <header class="container">
        <div class="container d-flex">
            <?php require_once("./components/directory.php"); ?>
            <?php require_once("./components/search.php"); ?>
        </div>
        <hr>
        <?php require_once("./components/createFolderForm.php"); ?>
        <hr>
    </header>
    
    <main class="container d-flex align-items-center justify-content-center">
        <?php require_once("./components/sideBar.php"); ?>
        <section class="file__container">
            <?php require_once("./components/renderFiles.php") ?>
        </section>
    </main>
    <?php require_once("./components/footer.php"); ?>
</body>

</html>