<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
  <body class="bod">
  <form  action="./dirManege/create.php" method="post">
        <input type="text" name="dirname" id="submitButon">
        <input type="submit" >
    </form>
  
      <section class="navBar"></section>
      <section class="aside"></section>
        
      <section class="folders">
        <?php
          require("./functions/dirManege.php");
            scan();
            if(isset($_SESSION["existingFolder"])){
              echo $_SESSION["existingFolder"];
            }    
        ?>
      </section>
 
  <!-- 
  <script src="script.js"></script> -->
  </body>
</html>
