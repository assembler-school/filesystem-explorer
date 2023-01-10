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
    <form action='prueba.php' method='get'>
        <input type='text' name='valor'>
    <button>Create new folder</button>
</form>
</section>


<section id="files">
    <p> My files </p>
    <button>Upload new file</button>
</section>


<section id="show-files">
    <p> file </p>
    <button>Modify</button>
    <button>Delete</button>

</section>

<?php
// mkdir('nuevaCarpeta', 0700);
// fopen('text.txt', 'w');
?>
</body>
</html>