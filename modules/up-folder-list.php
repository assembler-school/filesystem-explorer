<?php

if (isset($_SESSION["currentPath"])) {
    echo $_SESSION["currentPath"]; // TODO: Delete
    if ($_SESSION["currentPath"] !== "") {
        echo ("<tr><th scope='row'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-up-square' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z'/>
            </svg></th>
            <td>" . "<form method='post' action='./modules/up-folder.php' ><input type='submit' class='btn btn-link' name='folder-name' value='Go up' /></form></td><td> - </td>
            <td> - </td>
            <td> - </td></tr>");
    }
} 

// echo getcwd();
// if (getcwd() !== "./root") {
// }
