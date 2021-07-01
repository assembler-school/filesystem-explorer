

    <?php
    require('./functions/dirManege.php');
    // $dirToScan= $_POST["dirToRender"];
        $prevPath=$_POST["prevPath"];
        $inicialPath="./directories";
        $path=$_POST["path"];
        // if($prevPath=="./directories")
        $_SESSION["currentPath"]=$path;
        scanDirsContent($_SESSION["currentPath"]);   
    ?>
    <script>
        rightButton();
        dubleClick();
        showSureToRemove();
        editModal();
    </script>


