<?php
if (isset($_GET['search']) && $_GET['search']) {
    $search = $_GET['search'];
    echo "<div class='d-flex justify-content-center mt-2 fs-4'>Results of:<strong>&nbsp$search </strong></div>";
}
