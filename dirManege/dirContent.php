

    <?php
    require('../functions/dirManege.php');
    // $dirToScan= $_POST["dirToRender"]; 
    $path=$_POST["path"];  
    
    scanDirsContent($path);  
    
    ?>
    <script>
        rightButton();
        dubleClick();
        showSureToRemove();
        editModal();
    </script>


