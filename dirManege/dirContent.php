
<div>
    <button onclick="()=>{
        console.log('hola');
    }" ><</button>
    <?php
    require('../functions/dirManege.php');
    $dirToScan= $_POST["dirToRender"];   
    
    scanDirsContent($dirToScan);  
    
    ?>
</div>


