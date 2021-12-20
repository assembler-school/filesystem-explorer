<?php
include 'modules/htmlHeader.php';
?>
<?php
include 'modules/navBar.php';
include 'modules/createModal.php';
?>

<body>
    <div class="row">
        <aside class="col-3">
            <?php require 'showDir.php'  ?>
        </aside>
        <section class="col-6">
       
        <?php 
        require './sectionFiles.php'
        ?>

            <!-- <img src="./Root/assembler.jpg" alt="" width="100%"> -->
        </section>
        <aside class="col-3">
        <img src="./Root/1630658839121.gif" alt="" width="100%">
        </aside>
    </div>

    <form action="./createfolder.php" method="post" enctype="multipart/form-data">
        <input type="file" name="Fileimage" id="fileofimage">
        <input type="submit" value="Upload a file" name="buttclick">
    </form>

    <?= isset($_GET["error"]) ? "The name already exist" : ""; ?>

</body>

</html>