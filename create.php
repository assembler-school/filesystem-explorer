<?php

$create = $_POST['create'];

function createElements() {
    if(!isset($create)){
        $newFileName = "root/7-create-write-file.txt";
        // $fileContent = 'This is the content of the "3-create-write-file.txt" file.';
    
        // Now the file is created, but it's empty.
        $file = fopen($newFileName, "w");
    
        // Here we add the content to the file
        fwrite($file, "Content of the file");
    
        // You can add new content to the file
        // fwrite($file, "\nNew content in a new line.");
    
        $file = fopen($newFileName, "r");
    
        // Print the content
        $content = fread($file, filesize($newFileName));
        echo nl2br($content);
        // echo json_encode($content);
    
        // Close the file buffer
        fclose($file);
    }else{
        echo "error";
    }


// --------------------------------------------------
    // try {
    //     $newFileName = "root/7-create-write-file.txt";
    //     // $fileContent = 'This is the content of the "3-create-write-file.txt" file.';
    
    //     // Now the file is created, but it's empty.
    //     $file = fopen($newFileName, "w");
    
    //     // Here we add the content to the file
    //     fwrite($file, "Content of the file");
    
    //     // You can add new content to the file
    //     // fwrite($file, "\nNew content in a new line.");
    
    //     $file = fopen($newFileName, "r");
    
    //     // Print the content
    //     $content = fread($file, filesize($newFileName));
    //     echo nl2br($content);
    //     echo json_encode($content);
        
    
    //     // Close the file buffer
    //     fclose($file);
    // } catch (Throwable $t) {
    //     echo $t->getMessage();
    // }
    
    
}

?>