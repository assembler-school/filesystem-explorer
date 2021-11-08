<div class="container d-flex align-items-center justify-content-start">
    <?php
    if (isset($_GET["directory"])) {
        if (str_contains($_GET["directory"], ".") || str_contains($_GET["directory"], "..")) {
            header("Location: index.php?directory=root");
            if (is_dir($_GET["directory"])) {
                $path = explode("/", $_GET["directory"]);
                array_pop($path);
                $directory = implode("/", $path);
                closedir($dh);
            }
            // if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
            //     // print_r($_GET["directory"]);
            //     $path = explode("/", $_GET["directory"]);
            //     array_pop($path);
            //     $directory = implode("/", $path);
            // }
        }
    }
    ?>
    <button class="btn btn-outline-secondary" disabled>
    </button>
    <button class="btn btn-outline-secondary" disabled>></button>
    <?php echo isset($directory) ?  "<a href=index.php?directory=" . $directory . ">" : "<a href='index.php?directory=root'>" ?>
    <button class="btn__previous btn btn-outline-secondary">^</button></a>
    <?php echo isset($_GET["directory"]) ? $_GET["directory"] : "" ?>
</div>