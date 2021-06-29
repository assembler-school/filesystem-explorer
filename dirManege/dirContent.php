
<div>
    <?php
    require('../functions/dirManege.php');
    //unset($_SESSION["actualDir"]);
    $selected=$_POST["dirToRender"];
    $_SESSION["actualDir"] = "../directories$selected";   
    $_SESSION["inside"]=$_POST["inside"]; 
    scanDirsContent();
    ?>
</div>


