<div class="path__container">
    <?php
    if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
        $path = explode("/", $_GET["directory"]);
        array_pop($path);
        $directory = implode("/", $path);
        print_r($path);
    }



    ?>



    <?php echo isset($directory) ?  "<a href=index.php?directory=" . $directory . ">" : "<a href='index.php?directory=root'>" ?>
    <button>
        Back</button> </a>
    <button>></button>
    <div>path</div>

</div>