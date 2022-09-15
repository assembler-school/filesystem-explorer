<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/54141fca8b.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link href="../css/index.css" rel="stylesheet">
  <title>Confirm</title>
</head>
<body>
<?php 
    session_start();

    deleteFile();
    
    if(isset($_POST['file'])) {
        $myPath = $_POST['file'];
        $infoFile = pathinfo($myPath);
        $_SESSION['path'] = $myPath;
        $_SESSION['filename'] = $infoFile['filename'];
    }

    function deleteFile(){
        $filePath = $_POST['file'];

        if (substr($filePath, 0, 3) == '(F)') {
            echo "<main class='alert-delete'>";
            echo "<img src='../img/alert.png' alt='alert sign' width='250px'>";
            echo "<h1>You're about to delete a folder, this may delete all files inside.</h1>";
            echo "<h2>Confirm request: <a href='../../index.php'>NO</a> / <a href='./delete_folder.php'>YES</a>";
            echo "</main>";
        } else {
            if (unlink($filePath)) {
                header ('Location: ../../index.php');
            } else {
                echo "<main>";
                echo "Sorry, there was a problem deleting the file.";
                echo '<p><a href="../../index.php">Back</a></p>';
                echo "</main>";
            }
        }
    }
?>
</body>
</html>