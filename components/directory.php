<div class="path__container">
    <?php
    if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
        print_r($_GET["directory"]);
        $path = explode("/", $_GET["directory"]);
        array_pop($path);
        $directory = implode("/", $path);
    }
    ?>

    <?php echo isset($directory) ?  "<a href=index.php?directory=" . $directory . ">" : "<a href='index.php?directory=root'>" ?>
    <button>Back</button> </a>
    <button>></button>
    <div>path</div>

</div>