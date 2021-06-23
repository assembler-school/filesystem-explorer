<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <title>Document</title>
</head>
  <body>
  <form  action="./dirManege/create.php" method="post">
        <input type="text" name="dirname" id="submitButon">
        <input type="submit" >
    </form>
    
        <input type="text" name="newname" id="NameButon">
        <a href=´./dirManege/edit.php?hola´>ddd</a>
    
    <?php
      require("./functions/dirManege.php");
        scan();
        if(isset($_SESSION["existingFolder"])){
          echo $_SESSION["existingFolder"];
        }    
    ?>
  <!-- 
  <script src="script.js"></script> -->
  </body>
</html>
