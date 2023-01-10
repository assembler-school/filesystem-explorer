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
            <input type="text">
            </div>
            <div id="user"> 
            <img src="" alt="User image">
            </div>
</nav>
</header>

<main>

<section id="folders">
    <p> My folders </p>
    <button>Create new folder</button>
    <br><br>
<div id="folder">

    <?php

forEach (glob("*") as $name){
if(is_dir($name) && $name !== "panel.php"){
    echo '<li><div class="select-folder" name-folder="'.$name .'"><img src="../image/folder.ico" alt="image folder" class="imageFolder"> ' . $name . '</div><span class="modify-name-folder"><i class="fa-solid fa-pen" actual-folder="'.$name .'"></i></span><span class="delete-folder"><i class="fa-solid fa-trash" id="delete-folder" actual-folder="'.$name .'"></i></span></li>';
    

}
}
?>
</div>
</section>


<section id="files">
    <p> My files </p>
    <div id="open-folder">
</div>
    <button>Upload new file</button>
</section>


<section id="show-files">
    <p> file </p>
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