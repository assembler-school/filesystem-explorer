<?php
session_start();

if(!empty($_SESSION['user'])){
    header('location: root/panel.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File system explorer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div id="loginBody"> 
        <img id="logoLogin" src="image/logoNew.png" alt="Logo"/>
        <form id="form" method="post" action="assets/login.php">
            <div class="usernameLogin marginLogin">
                <label for="username">Username</label><br>
                <input type="text" name="user" id="username" maxlength='20' required>
            </div>
            <div class="passwordLogin marginLogin">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required>
            </div>

                <?php
                    if(isset($_GET['msg'])){
                        switch($_GET['msg']){
                            case 'errorLogin':
                                echo '<p id="errorMessageLogin">Username or password is wrong!</p>';
                                break;
                            case 'emptyFields':
                                echo '<p id="errorMessageLogin">All fields must be filled!</p>';
                                break;       
                            } 
                    }
                ?>
            <div class="buttonsLogin marginLogin"> 
                <button type="submit">Log in</button>
                <button>Sing up</button>
            </div>
        </form>
    </div>
</body>
</html>