<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileExplorer</title>
</head>

<body>
    <p>
        <?php
        $ePath = explode("\\", getcwd());
        $e = $ePath[count($ePath) - 1];
        echo ($e);
        ?>
    </p>
    <form method="POST" action="validation.php">
        <label for="newFile">Name of the new file</label>
        <input type="text" id="newFile" name="newFile">

        <button type="submit">Create Folder</button>
    </form>
</body>

</html>