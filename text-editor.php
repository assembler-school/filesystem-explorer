<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Text editor</title>
</head>
<body>
<header>
        <nav id="navigation">
            <div id="logo"> 
                <a href='./root'>
                    <img src="./image/logoNew.png" alt="Logo" id="logo-panel">
                </a>
            </div>
            <div id="search"> 
            <form method="GET" action="search.php">
                <input type="text" name="q" class="search" placeholder="Search">
            </form>
            </div>
            <div id="user"> 
            <a href="./assets/close-session.php">
                <button>Sign out</button>
            </a>
            </div>
        </nav>
    </header>

<div class="text-editor">
    <h1>Text editor</h1>

    <form method="POST" action="./assets/edit-text.php"> 
    <textarea name="text"><?php 
        $file = $_GET["pathFile"];
        $content = file_get_contents("./".$file);
        echo $content;
        ?> 
        </textarea>
        <input name="filePath" type="hidden" value="<?php echo "../$file"; ?>" >

    <button type='submit'>Save changes</button><button id='delete-file'>Delete</button>
</form>
</div>
<script src="./assets/js/app.js"></script>
</body>
</html>