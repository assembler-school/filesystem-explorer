<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocket File System </title>
    <!--Todo  Links CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--Todo Links CSS -->
    <link rel="stylesheet" href="./assets/normalize.css">
    <link rel="stylesheet" href="./assets/stylefile.css">


    <!--Todo Scripts JavaScript -->
    <script src="./mainScript.js"></script>
</head>
<?php
include 'modules/navBar.php';
include 'modules/createModal.php';
?>

<body>
    <div class="row">
        <aside class="col-lg-2 col-sm-6 m-1">
            <?php require 'showDir.php'  ?>
        </aside>
        <section class="col-lg-6 col-sm-6 m-1" >
        <?php
            include "search.php";
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"> Icon</th>
                        <th scope="col">File Name </th>
                        <th scope="col">File Size</th>
                        <th scope="col">Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php sectionFilesTable()  ?>
                </tbody>
            </table>
        </section>
        <aside class="col-lg-3 col-sm-12 m-1" id='asidefile'>
        </aside>
    </div>
    <?= isset($_GET["error"]) ? "The name already exist" : ""; ?>

</body>

</html>