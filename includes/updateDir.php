<?php 
    session_start();

    if(!isset($_SESSION['currentPath'])){
        // echo "I'm in <br>";
        $_SESSION['currentPath'] = "C:/xampp/htdocs/projects/filesystem-explorer/root";
        $_SESSION['mainRootPath'] = "C:/xampp/htdocs/projects/filesystem-explorer/root";
        
    }else if(isset($_GET['updateDir'])){

        $_SESSION['currentPath'] = $_GET['updateDir'];
        header("Location: ../index.php");
    }

    // echo $_SESSION['currentPath'];
    // echo "I am the main root path --> ".$_SESSION['mainRootPath'];
    
?>