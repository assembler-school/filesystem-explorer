<?php
require_once("CRUD/create.php");
require_once( "CRUD/upload.php");
require_once( "CRUD/folder-list.php");

$raiz = './root';
if(isset($_REQUEST['route'])){
    $raiz = $raiz . '/' . $_REQUEST['route'];
}
echo 'carpeta es: ' .$raiz;

holaaaa
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

                <form method="POST" class="nombre-fom">
                    <input type="text" name="nombre" />
                    <input type="submit" name="crear" class="refresh" />
                </form>

            </div>

            <div class="col-md-10">

                <form action="index.php" enctype="multipart/form-data" method="POST">
                    <input type="file" name="nombre" id="">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    <input type="submit" value="Upload">
                </form>

            </div>

        </div>
    </header>

    <section class="container-fluid" id="section-content">
        <div class="row" id="content-box">

            <div class="col-md-3 border border-dark-1" id="root">
                <?php viewElements($root,"./root");?>
            </div>


            <div class="col-md-7" id="content-element">
                <div class="row text-center">

                    <?php  viewElements($root, $raiz);?>
                </div>
            </div>


            <div class="col-md-2 border border-dark-1" id="prueba">
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="script.js" defer></script>

</body>

</html>