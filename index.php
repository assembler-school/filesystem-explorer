<?php
session_start();
require_once("./CRUD/create.php");
require_once( "./CRUD/upload.php");
require_once( "./CRUD/folder-list.php");


$folderEstructure = "root";
if(isset($_REQUEST['route'])){
    if(isset($_SESSION["altPath"])){
        $_SESSION["altPath"] = '';
    }
    $_SESSION["altPath"] = $_REQUEST["route"];
    $folderEstructure = $folderEstructure . '/' . $_REQUEST['route'];
}else{
    $_SESSION["altPath"] = '';
}



// echo "<pre>";


//     var_dump("./root");


// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="es">

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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" target="" class="create-form">
                                <div class="modal-body text-center">
                                    <input type="text" size="25" placeholder="Folder name" name="name-folder" class="nameFolder">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="enviar" value="Save changes" class="refresh">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <form enctype="multipart/form-data" method="POST">
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
                <?php viewFolderStructure($root);?>
            </div>


            <div class="col-md-7 border border-dark-1" id="content-element">
                <div class="row text-center">
                    <?php
                    viewFolderElements($completeRoot);
                          
                    ?>      
                    
                    
                </div>
            </div>


            <div class="col-md-2 border border-dark-1" id="prueba">
                    <?php
                        $sizeInKb = filesize("./root/12345123/boton-de-panico.png") / 1024;
                        $sizeInMb = $sizeInKb / 1024;

                        if($sizeInKb < 1024) {
                            echo round($sizeInKb, 1) . "KB"; 
                            echo "creation date:" . date("F d Y H:i:s.", filectime("./root/12345123/boton-de-panico.png"));
                            echo "updating date:" . date("F d Y H:i:s.", fileatime("./root/12345123/boton-de-panico.png"));
                        }else {
                            echo round($sizeInMb, 1) . "MB";
                            echo "creation date:" . date("F d Y H:i:s.", filectime("./root/12345123/boton-de-panico.png"));
                            echo "updating date:" . date("F d Y H:i:s.", fileatime("./root/12345123/boton-de-panico.png"));
                        }
                        

                    ?>  
                
            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    <script src="script.js?v=<?php echo (rand()); ?>" defer></script>
                    
</body>

</html>