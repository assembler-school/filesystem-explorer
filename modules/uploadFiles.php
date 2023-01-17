<?php
$dataPath = $_REQUEST["dataPath"];
$arrayData = array();

if(isset($_FILES['inputUploadFile'])){
/*     if(isset($_POST["file"])){ */
        $file = $_FILES["inputUploadFile"];

        if(!$file){
            echo json_encode ("DolarFile no existe ");
        } else {
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
                    $succes = "File uploaded successfully";
                    array_push($arrayData, $succes);
                    array_push($arrayData, $fileNameNew);
                    array_push($arrayData, $fileActualExt);
                    echo json_encode ($arrayData);
                }else{
                    echo json_encode ("Error. Your file is bigger than 100Mb");
                }
            } else {
                echo json_encode ("There was an error uploading your file!");
            }
    }
} else {
    echo json_encode ("Dolar_FILES no existe");
}
   /*  } */