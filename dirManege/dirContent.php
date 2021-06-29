
<div>
    <button onclick="()=>{
        console.log('hola');
    }" ><</button>
    <?php
    require('../functions/dirManege.php');
    $dirToScan= $_POST["dirToRender"];   
    $path= $_POST["path"];
    $_SESSION["path"]=$path;
    echo $path;
    scanDirsContent($dirToScan);  
    
    ?>
</div>


