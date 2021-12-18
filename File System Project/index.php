<?php
    include 'modules/htmlHeader.php';
?>

<body>
    <!-- <nav> -->
    <?php
    include 'modules/navBar.php';
    include 'modules/createModal.php';

    ?>

    <div class="container-fluid fb-seccionplus fb-bgoscuro">
    <?php
    include './showDir.php';
    ?>
    </div>
    <!-- </nav>
    <form action="./createfolder.php" method="post">
    <input name="folderName" type="text"  id="nameFolder">
    <button name="createfolder">Create a folder</button>
    <label class="form-label" for="CreateFile"><?= isset($_GET["error"]) ? "The name already exist" : ""?></label>
    </form>
    <form action="./createfolder.php" method="post">
    <input type="text" name="prueba" id="">
    <button type="submit">Create a file</button>
    <!-- <button onclick="createfile()"> </button> -->
    <!-- </form> -->


</body>
</html>