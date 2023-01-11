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
                <img src="../image/logo.webp" alt="Logo" id="logo-panel">
            </div>
            <div id="search"> 
            <input type="text" name="search" class="search" placeholder="Search">
            </div>
            <div id="user"> 
            <img src="" alt="User image">
            </div>
</nav>
</header>

<main>

<section id="folders">
    <p> My folders </p>
    <br><br>
<div id="folder">

    <?php

forEach (glob("*") as $name){
if(is_dir($name) && $name !== "panel.php"){
    echo '<li><div class="select-folder" name-folder="'.$name .'"><img src="../image/folder.ico" alt="image folder" class="imageFolder" name-folder="'.$name .'"> ' . $name . '</div><span class="modify-name-folder"><i class="fa-solid fa-pen" actual-folder="'.$name .'"></i></span><span class="delete-folder"><i class="fa-solid fa-trash" id="delete-folder" actual-folder="'.$name .'"></i></span></li>'; 
}
}
$root = "../root";
print_r(scandir($root));
?>

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


<section id="show-files">
    <p> file </p>
    <div id="display-content"></div>
    <button>Modify</button>
    <button>Delete</button>

</section>

<div>
<input id="folder-name" type="text" placeholder="New folder">
<button id="button-folder-name">Create new folder</button>
</div>

<script src="../assets/js/app.js"></script>
</body>
</html>