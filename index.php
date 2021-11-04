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

<body class="container">
    <header class="container">
        <?php require_once("./search.php"); ?>
        <?php require_once("./directory.php"); ?>
        <?php require_once("./createFolderForm.php"); ?>
        <?php
        if (isset($_POST["folder"])) {
            if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
                $mkdirRoute = "./" . $_GET["directory"];
            } else {
                $mkdirRoute = "./root/";
            }
            mkdir($mkdirRoute . "/" . $_POST["folder"], 0777, true);
        }
        ?>
    </header>
    <main class="container d-flex align-items-center justify-content-center">
        <?php require_once("./sideBar.php"); ?>
        <section class="file__container">
            <?php
            if (!isset($_GET["search"])) {
                if (isset($_GET["directory"]) && explode("/", $_GET["directory"])[0] == "root" && !str_contains($_GET["directory"], "..")) {
                    $directory =  $_GET["directory"];
                } else {
                    $directory = 'root';
                }

            scandir($directory, SCANDIR_SORT_ASCENDING);
                if (is_dir($directory)) {
                    if ($dh = opendir($directory)) {
                        while (($file = readdir($dh)) !== false) {
                            if ($file === "." || $file === "..") {
                            } else {
                                if (filetype("$directory/$file") == "dir") {
                                    echo "<div><a class='folder' href=index.php?directory=" . $directory . "/" . $file . ">$file</a><a href=erase.php?erase=$directory/$file><button>x</button></a></div>";
                                } else {
                                    echo "<div><a class='file' href=index.php?directory=" . $directory . "/" . $file . ">$file</a><a href=erase.php?erase=$directory/$file><button class='btn btn-info'>x</button></a></div>";
                                }
                            }
                        }
                        closedir($dh);
                    }
                }
            }
            ?>
        </section>
    </main>
</body>

</html>