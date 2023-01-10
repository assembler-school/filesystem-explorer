<?php

    $route = "root";
  function viewElements($route){

    if (is_dir($route)){
        $manager = opendir($route);
        echo "<ul>";

        
        while (($file = readdir($manager)) !== false)  {

            $complete_route = $route . "/" . $file;

            if ($file != "." && $file != "..") {
                
                if (is_dir($complete_route)) {
                    echo "<li class='folderElements'>" . $file . "</li>";
                    viewElements($complete_route);
                } else {
                    echo "<li class='folderElements'>" . $file . "</li>";
                }
            }
        }

        closedir($manager);
        echo "</ul>";
    } else {
        echo "Not a valid directory path<br/>";
    }
}

function createElements() {
    
    try {
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
        // echo nl2br($content);
        ;
        
    
        // Close the file buffer
        fclose($file);
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
    
    
}



// echo json_encode(createElements());

?>