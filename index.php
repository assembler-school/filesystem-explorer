<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Send AJAX request to PHP file</h1>
    <div id="fileListContainer"><?php require_once "./modules/listFiles.php" ?></div>
    <div id="infoFileContainer" class="custom-box">
        <p id="fileSize"></p>
        <p id="fileCreationDate"></p>
        <p id="fileContent"></p>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>