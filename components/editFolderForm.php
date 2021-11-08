<?php
if (isset($_GET["edit"])) {

    echo "
    <div class='d-flex my-2'>
        <form class='d-flex w-100' action='' method='POST'>
            <input class='form-control' type='text' placeholder='New folder/file name' name='edit-name'>
            <input class='btn btn-outline-secondary' type='submit' value='Edit name'>
        </form>
    </div>
    ";

    if (isset($_POST["edit-name"])) {
        $directory = $_GET["directory"];

        $editName = $_POST["edit-name"];
        $editPath = $_GET["edit"];

        $editDirectory =  explode("/", $editPath);
        array_pop($editDirectory);
        $editDirectory = implode("/", $editDirectory);

        rename($editPath, "$editDirectory/$editName");
        header("Location: index.php?directory=$directory");
    }
}
