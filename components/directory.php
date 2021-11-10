<div class="container d-flex align-items-center justify-content-start">
    <?php
    if (isset($_GET["directory"])) {
        if (str_contains($_GET["directory"], ".") || str_contains($_GET["directory"], "..")) {
            header("Location: index.php?directory=root");
        } else if (is_dir($_GET["directory"])) {
            $path = explode("/", $_GET["directory"]);
            array_pop($path);
            $directory = implode("/", $path);
        }
    }
    ?>
    <?php echo isset($directory) ?  "<a href=index.php?directory=" . $directory . ">" : "<a href='index.php?directory=root'>" ?>
    <button class="mx-3 btn btn-outline-secondary"><i class="fas fa-arrow-up"></i></button></a>
    <div class="d-flex justify-content-center align-items-center">
        <?php require_once("./components/navBar.php"); ?>
    </div>
</div>