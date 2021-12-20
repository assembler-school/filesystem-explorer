<?php
include 'modules/htmlHeader.php';

?>
<?php
include 'modules/navBar.php';
include 'modules/createModal.php';
?>

<body>
<h1>pruebaaa</h1>
    <div class="row">
        <aside class="col-3">
            <?php require 'showDir.php'  ?>
        </aside>
        <section class="col-6">

        <?php
        sectionFiles();
        

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

    <form action="./createfolder.php" method="post" enctype="multipart/form-data">
        Type Folder Name:<input type="text" name="foldername" /><br /><br />
        Select Folder to Upload: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br /><br />
        <input type="Submit" value="Upload" name="upload" />
     </form>
    <?= isset($_GET["error"]) ? "The name already exist" : ""; ?>

</body>

</html>