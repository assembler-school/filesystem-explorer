<?php
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    echo "<div class='d-flex justify-content-center'>Results of: $search</div>";
}
