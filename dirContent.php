

    <?php
    require('./functions/dirManege.php');
    // $dirToScan= $_POST["dirToRender"];
        $path=$_POST["path"];
        $_SESSION["currentPath"]=$path;
        scanDirsContent($_SESSION["currentPath"]);   
    ?>
    <script>
        rightButton();
        dubleClick();
        showSureToRemove();
        editModal();
    </script>


