<?php
$a = scandir("./root");

implode(" ",$a);

?>

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
        <?php require_once("./side-bar.php"); ?>
        <section class="file__container">
            <div><?=nl2br(implode(" ",$a));?></div>
            <div>Folder2</div>
            <div>File1</div>
        </section>
    </main>
</body>

</html>