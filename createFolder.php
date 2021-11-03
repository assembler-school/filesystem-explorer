<?php
if (isset($_POST["folder"])) {
    mkdir('./root/' . $_POST["folder"], 0777);
    header("Location: ./");
}
