<?php

$optionSelected = $_POST["menu"];

switch ($optionSelected) {
    case "1":
        echo "uno";
        break;
    case "2":
        echo "dos";

        break;
    case "3":
        echo "tres";

        break;

    default:
        echo "none";
        break;
}
