<?php

echo "file actions" . "<br>";
// echo "file name " . $_POST['value'] . "<br>";

if (isset($_POST['delete'])) {
    //action for update her
    echo "file name " . $_POST['delete'] . "<br>";
    echo "delete";
} else if (isset($_POST['open'])) {
    echo "open";
    //action for delete
} else {
    echo "other";
    //invalid action!
}
