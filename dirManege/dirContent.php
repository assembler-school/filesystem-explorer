
<div>
    <?php
    require('../functions/dirManege.php');
    //unset($_SESSION["actualDir"]);
    $_SESSION["actualDir"] = $_POST["dirToRender"];   
    $_SESSION["inside"]=$_POST["inside"]; 
    scanDirsContent();
    
    ?>
</div>


