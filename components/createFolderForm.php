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
<form action="" method="POST">
    <input type="text" placeholder="Folder name" name="folder">
    <input type="submit" value="Create folder">
</form>
<?php
