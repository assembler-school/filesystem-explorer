
<div>
    <button onclick="()=>{
        console.log('hola');
    }" ><</button>
    <?php
    require('../functions/dirManege.php');
    $dirToScan= $_GET["dirToRender"];   
    scanDirsContent($dirToScan);    
    ?>
</div>


