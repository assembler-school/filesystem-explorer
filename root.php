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
<?php
function makedir(){
  $dirname=$_POST["dirname"];
  mkdir("./test/$dirname");
}
makedir();

function scan(){
  $dirs= scandir("./test");
  foreach($dirs as $item){
    echo "<div id='$item' class='folder'>";
    echo nl2br("\n $item");
    echo "<button type='submit' class='buton'>Delete";
    echo "</button>";
    echo "</div>";
    }; 
}
scan();
function funciona(){
    return "esto chuta";
}
?>


<!-- <script src="script.js"></script> -->
</body>
</html>
