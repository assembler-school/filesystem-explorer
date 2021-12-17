<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/63f29c9463.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <!-- logo commes in figure tag -->
        <figure>

        </figure>
    </header>
    <!-- Here commes the directories -->
    <aside>

    </aside>
    <!-- navigation url -->
    <nav class="url">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
            <i class="fas fa-info-circle fa-2x" id="infoCircle"></i>
        </ol>
    </nav>

    <!-- Main has to be a grid or flexbox responsive with cols and rows of bootstrap -->
    <main class="container">
        <!-- Cada section sera un fichero diferente que carga -->
        <article class="row">
            <section class="col-4">
                <div class="col d-flex flex-column">
                    <img src="./assets/img/test.jpg" alt="photo">
                    <div class="infoCard">
                        <img src="./assets/img/img-icon.png" alt="img-icon" width="50">
                        <p class=" fileName">File.png</p>
                    </div>
                </div>
            </section>

        </article>
    </main>
</body>

</html>