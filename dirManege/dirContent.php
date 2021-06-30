

    <?php
    require('../functions/dirManege.php');
    // $dirToScan= $_POST["dirToRender"]; 
    $path=$_POST["path"];  
    
    scanDirsContent($path);  
    
    ?>


