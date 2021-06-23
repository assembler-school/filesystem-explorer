<?php

echo "file actions" . "<br>";

if ($_POST['action'] == 'delete') {
    //action for update her
    echo "delete";
} else if ($_POST['action'] == 'Delete') {
    //action for delete
} else {
    //invalid action!
}
