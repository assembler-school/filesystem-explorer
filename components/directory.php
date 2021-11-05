<div class="container d-flex align-items-center justify-content-start">
    <?php
    if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
        // print_r($_GET["directory"]);
        $path = explode("/", $_GET["directory"]);
        array_pop($path);
        $directory = implode("/", $path);
    }
    ?>
    <button class="btn btn-outline-secondary" disabled><i class="fas fa-arrow-left"></i></button>
    <button class="btn btn-outline-secondary" disabled><i class="fas fa-arrow-right"></i></button>
    <?php echo isset($directory) ?  "<a href=index.php?directory=" . $directory . ">" : "<a href='index.php?directory=root'>" ?>
        <button class="btn__previous btn btn-outline-secondary"><i class="fas fa-arrow-up"></i></button></a>
        <?php echo isset($_GET["directory"])? $_GET["directory"] : "" ?>
</div>