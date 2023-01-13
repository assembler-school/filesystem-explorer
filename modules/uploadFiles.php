<?php

$dataPath = $_REQUEST["dataPath"];

/*     if(isset($_POST["file"])){ */
        $file = $_FILES["file"];

        $fileName = $file["name"];
        $fileTmp = $file["tmp_name"];
        $fileSize = $file["size"];
        $fileError = $file["error"];
        $fileType = $file["type"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if($fileError === 0){
            if($fileSize < 100000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "../files/".$dataPath.$fileNameNew;
                move_uploaded_file($fileTmp, $fileDestination);
                header("Location: ../index.php?uploadsuccess");
            }else{
                echo "Error. Your file is bigger than 100Mb";
            }
        } else {
            echo "There is an error uploading your file!";
        }
   /*  } */