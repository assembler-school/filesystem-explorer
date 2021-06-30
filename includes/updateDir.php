<?php 
    session_start();

    if(!isset($_SESSION['currentPath'])){
        // echo "I'm in <br>";
        $_SESSION['currentPath'] = "C:/xampp/htdocs/projects/filesystem-explorer/root/";
        // C:/xampp/htdocs/projects/filesystem-explorer/

    }else if(isset($_GET['updateDir'])){

        $_SESSION['currentPath'] = $_GET['updateDir'];
        header("Location: ../index.php");
    }

    echo $_SESSION['currentPath'];
    
    
?>