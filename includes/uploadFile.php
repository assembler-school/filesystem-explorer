<?php 

    require("./updateDir.php");

    if (isset($_POST['submit'])){

        $file = $_FILES['file'];
        print_r($file);

        // Establish fileUploadDir directory
        $fileUploadDir = $_SESSION['currentPath'];

        // File info
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        // File extension and then File extension in lowercase
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed file extensions
        $allowed = array('doc', 'csv', 'jpg', 'png', 'txt', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4');

        // Checking if file to upload extension is contained in the allowed extensions array
        if(in_array($fileActualExt, $allowed)){
            // Checking if there was an error ($fileError === 0 means no error)
            if($fileError === 0){
                // Checking file size (for now file size limit set at 1000000)
                if($fileSize < 10000000){
                    // Creating unique id for the file to avoid replacement issues
                    // and also creating the file upload destination and redirect to
                    // index.php once the process has finished
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = $fileUploadDir.'/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ../index.php?uploadsuccess");
                }else{
                    echo "Your file is too big!";
                }
            }else{
                echo "There was an error uploading your file!";
            }
        }else{
            echo "You cannot upload files of this type!";
        }
    }

?>