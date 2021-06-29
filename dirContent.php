
<div>
    <?php
    require('./functions/dirManege.php');
    //unset($_SESSION["actualDir"]);
    $selected=$_POST["dirToRender"];
    $_SESSION["actualDir"] = "$selected";   
    $_SESSION["inside"]=$_POST["inside"]; 
    scanDirs();
    ?>
</div>


