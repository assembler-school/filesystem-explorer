<?php

// CONNECTION WITH DATA BASE 

$dsn = "mysql:host=localhost;dbname=files_system";
$dbusername ="root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);
?>