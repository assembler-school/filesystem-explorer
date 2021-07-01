<?php
session_start();

/* -------------------------------------------------------------------------- */
/*                              SESSION VARIABLES                             */
/* -------------------------------------------------------------------------- */
if (!isset($_SESSION["basePath"])) {
    $_SESSION["basePath"] = getcwd();
}

if (!isset($_SESSION["currentPath"])) {
    $_SESSION["currentPath"] = "root";
}

if (!isset($_SESSION["currentDirectories"])) {
    $_SESSION["currentDirectories"] = array();
}

if (!isset($_SESSION["searchFiles"])) {
    $_SESSION["searchFiles"] = array();
}

if (!isset($_SESSION["matchedFiles"])) {
    $_SESSION["matchedFiles"] = array();
}

if (!isset($_SESSION["isSearching"])) {
    $_SESSION["isSearching"] = false;
}
if (!isset($_SESSION["searchText"])) {
    $_SESSION["searchText"] = "";
}

if (isset($_GET["deleteSearch"])) {
    $_SESSION["isSearching"] = false;
    $_SESSION["searchText"] = "";
}

require_once("./modules/searchFile.php");

// unset($_SESSION);
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- Dependencies -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/sass/sass.dart.js"></script>


    <!-- Link to icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Styles -->
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <title>File System</title>
</head>

<body class="d-flex flex-column justify-content-center align-items-center">
    <main class="d-flex flex-column justify-content-center m-0 mb-4">
        <!-- HEADER -->
        <div class="row header m-0 p-2 d-flex justify-content-between align-items-center">
            <h2 class="col col-2 logo p-0 m-0">SpamFile!</h2>
            <form class="col col-7 p-0 px-3 d-flex justify-content-between align-items-center" id="searchForm" action="./modules/searchSubmit.php" method="POST" enctype="multipart/form-data">
                <input type="text" id="searchInput" name="searchValue" class="search-bar" placeholder="Search files" value="<?php echo $_SESSION["searchText"] ?>">
                <a href="./index.php?deleteSearch=true">
                    <i class="uil uil-backspace"></i>
                </a>
            </form>
            <div class="col col-3 top-buttons d-flex justify-content-end align-items-center p-0">
                <form action="./modules/uploadFileDb.php" method="POST" enctype="multipart/form-data">
                    <label class="custom-upload">
                        <input value="New file" type="file" id="uploadedFile" name="uploadedFile" class="btn btn-light" />
                        <div class="btn btn-outline-dark">Choose file</div>
                    </label>
                    <input id="uploadButton" value="Upload" type="submit" class="btn btn-dark" disabled />
                </form>
                <button type='button' class="create-folder btn btn-dark" data-bs-toggle="modal" data-bs-target="#newDirectoryModal">
                    <i class="fas fa-folder-plus"></i>
                </button>
            </div>
        </div>
        <!-- BOTTOM -->
        <div class="row bottom m-0">
            <div class="col col-2 bottom-block sidebar-left d-flex flex-column pt-2">
                <?php
                require_once("./modules/allDirectories.php");
                ?>
            </div>
            <div class="col col-7 px-0 bottom-block central d-flex flex-column justify-content-center align-items-center">
                <div class="row central-columns py-2 d-flex justify-content-start align-items-center">
                    <div class="row col col-5 px-0 icon-and-name-col d-flex justify-content-center">
                        <p class="col col-2 column-text">Type</p>
                        <p class="col col-10 column-text">Name</p>
                    </div>
                    <p class="col col-2 column-text">Size</p>
                    <p class="col col-2 column-text">Creation</p>
                    <p class="col col-2 column-text">Modification</p>
                </div>
                <div class="central-files">
                    <?php
                    require_once("./modules/directoryFiles.php");
                    ?>
                </div>
            </div>
            <div class="col col-3 bottom-block sidebar-right">
                <?php
                require_once("./modules/filePreview.php");
                ?>
            </div>
        </div>
    </main>

    <div class="drop-wrapper d-flex justify-content-center align-items-center">
        <h4>Drop me a file</h4>
    </div>

    <!-- -------------------- -->
    <!-- MODALS -->
    <!-- -------------------- -->

    <!-- Create directory -->
    <div class="modal fade" id="newDirectoryModal" tabindex="-1" aria-labelledby="newDirectoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDirectoryLabel">Add new folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./modules/createFolder.php" id="newFolderForm">
                        <label for="directoryName" class="mb-2 modal-item modal-title">Folder name</label>
                        <input type="text" name="directoryName" class="pl-3 modal-item modal-input" placeholder="Insert name" required autofocus>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark" form="newFolderForm">Add folder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit file -->
    <div class="modal fade" id="editFileModal" role="dialog" tabindex="-1" aria-labelledby="editFileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFileLabel">New file name</h5>
                    <button id="btnCloseCross" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editFileForm" name="editFileForm">
                        <label for="fileName" class="mb-2 modal-item modal-title">File name</label>
                        <input type="text" id="fileName" name="fileName" class="pl-3 modal-item modal-input" placeholder="Insert new name" autofocus>
                        <input type="text" name="oldFileName" id="oldName" class="pt-2 pl-3 modal-item" required>
                        <input name="oldPath" id="oldPath" class="pt-2 pl-3 modal-item" required>
                        <div id="editAlert" class="alert alert-danger">
                            <strong>Warning!</strong> This field can´t be empty
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnRename" type="submit" class="btn btn-dark" form="editFileForm">Rename</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Passing data to the modal
        $('#editFileModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('old')
            var oldpath = button.data('path')
            var modal = $(this);
            console.log("This is the recipient ", recipient);
            modal.find('.modal-body form #oldName').val(recipient);
            modal.find('.modal-body form #oldPath').val(oldpath);
        })

        // Disabling upload button
        $("#uploadedFile").on("change", function() {
            console.log("Changed!");
            $("#uploadButton").prop('disabled', false);
        })

        // Focus search bar
        $('#searchInput').focus()

        // Input validation (edit)
        $("#editAlert").hide();

        $("#editFileForm").on("submit", function(e) {
            e.preventDefault();
            var file_name = $(this).find('#fileName');
            var old_name = $(this).find('#oldName');
            var old_path = $(this).find('#oldPath');
            if ($.trim(file_name.val()) == $.trim(old_name.val())) {
                $("#editAlert").show();
                console.log("esta haciendo submit?(if)")
            } else {
                $("#editAlert").hide();
                document.location = `./modules/editFiles.php?fileName=${file_name.val()}&oldFileName=${old_name.val()}&oldPath=${old_path.val()}`;
            }
        });
    </script>
</body>

</html>