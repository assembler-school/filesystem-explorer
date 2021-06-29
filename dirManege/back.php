<?php
session_start();
echo $_SESSION["actualDir"];
unset($_SESSION["actualDir"]);
echo $_SESSION["actualDir"];
header("Location:../root.php");