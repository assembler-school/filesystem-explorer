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
<div class="container d-flex align-items-center justify-content-center m-1">
    <form class="create__form d-flex align-items-center justify-content-center" action="" method="POST">
        <input class="form-control" type="text" placeholder="Folder name" name="folder">
        <input class="btn btn-outline-secondary" type="submit" value="Create folder">
    </form>
</div>
<?php
