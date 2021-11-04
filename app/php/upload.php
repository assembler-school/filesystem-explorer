<?php
$target_dir = "../../storage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$fileName =  basename($_FILES["fileToUpload"]["name"]);
if (isset($_POST["submit"])) {
    $check = file_exists($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo '<script>Swal.fire("Saved!", "", "success")</script>';
        $uploadOk = 1;
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo ' FileName ' . $fileName . ' FileType ' . $fileType;
        } else {
            echo "<p>¡Posible ataque de subida de ficheros!</p>";
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

?>
<p><a href="../../index.php">Back</a></p>