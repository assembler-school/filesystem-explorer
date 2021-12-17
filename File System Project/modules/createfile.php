if(isset($_POST)){
    $namefolder= $_POST["folderName"];
    createNewFolder();
}

function fopean(){

    try{
        $newFileName = "";
        $content= "..root/prueba";

        $file= fopen($newFileName, "w");
        fwrite($file, $content);

    }catch(Throwable $t){
        echo $t -> getMessage();
    }

}