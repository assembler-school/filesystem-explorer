<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome</title>
</head>
<body>
    <header>
        <nav id="navigation">
            <div id="logo"> 
                <img src="../image/logoNew.png" alt="Logo" id="logo-panel">
            </div>
            <div id="search"> 
                <form method="get" action="../search.php">
            <input type="text" name="q" class="search" placeholder="Search">
</form>
            </div>
            <div id="user"> 
            <a href="../assets/close-session.php">
                <button>Sign out</button>
            </a>
            </div>
</nav>
</header>
<section class="pop-up-file hidden">
            <div class="close-popup-file">
                <i class="fa-solid fa-xmark" id="close-popup"></i>
                <i class="fa-solid fa-trash" id="delete-file"></i>
            </div>
            <div id="view-content"> </div>
            <div class="cover"></div>
</section>
<main>

<section id="folders">
    <p> My folders </p>
<div id="folder">
</div>

<br><br>
<div id="trash-container">
<i class="fa-solid fa-trash"></i><p id="trash-p">Trash</p>
</div>
<div class='fixed-button'>
<div id='create-new-folder'>
<i class="fa-solid fa-plus"></i>
</div>
</div>
</section>


<section id="files">
    <p> My files </p>
    <div id="open-folder">
    </div>
<form method="post" action="../assets/upload-file.php" enctype="multipart/form-data">
    <input type="file" name="uploadFile" class="upload-new-file">
    <input type="hidden" name="uploadFolder" value="">
    <br>
    <button id="upload-file">Upload new file</button>
</form>
</section>



<script src="../assets/js/app.js"></script>
</body>
</html>