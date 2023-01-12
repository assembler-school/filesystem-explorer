<?php
require_once("./functions.php");
require_once("./CRUD/create.php");
require_once("./CRUD/upload.php");

$mainFolder = "./root";
if (isset($_REQUEST["go"])) {
    $mainFolder = $mainFolder . "/" . $_REQUEST["go"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Local File System Explorer</title>
</head>

<body>
    <header class="container-fluid" id="header">

        <div class="content-buttons row ">

            <div class="col-md-2">

                <input type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Create">
                    


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New folder</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" target="">
                                <div class="modal-body text-center">
                                    <input type="text" size="25" placeholder="Folder name" name="name-folder">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Save changes" id="refresh">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">

                <form action="#" enctype="multipart/form-data" method="POST">
                    <input type="file" name="nombre">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    <input type="submit" value="Upload" class="refresh">
                </form>

            </div>

        </div>
    </header>

    <section class="container-fluid" id="section-content">
        <div class="row" id="content-box">

            <div class="col-md-3 border border-dark-1" id="root">
                <?php viewElements($mainFolder) ?>
            </div>


            <div class="col-md-7 border border-dark-1" id="content-element">
                <div class="row text-center">

                <?php echo $listar ?>
                </div>
            </div>


            <div class="col-md-2 border border-dark-1">
            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    <script src="script.js?v=<?php echo (rand()); ?>" defer></script>

</body>

</html>