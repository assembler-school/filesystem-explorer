 <?php
    session_start();
    function getAllFiles($dir, &$results = array())
    {
        $files = scandir($dir);
        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = ['path' => realpath($path), 'name' => $value];
            } else if ($value != "." && $value != "..") {
                getAllFiles($path, $results);
                $results[] = ['path' => $path, 'name' => $value];
            }
        }
        return $results;
    }

    $filesList = getAllFiles("../root");
    $fileToDelete = isset($_POST["delete"]) ? $_POST["delete"] : null;

    function removeDirectory($path)
    {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }

    foreach ($filesList as $file) {
        if (isset($fileToDelete)) {
            if (is_file($file["path"]) && $file["name"] === $fileToDelete && file_exists($file["path"])) {
                unlink($file["path"]);
                header("Location: ../index.php?deleted=true");
            } elseif (is_dir($file["path"]) && $file["name"] === $fileToDelete && file_exists($file["path"])) {
                removeDirectory($file["path"]);
                header("Location: ../index.php?deleted=true");
            }
        } elseif (isset($_POST["rename"]) && isset($_POST["newName"])) {
            $fileName = explode(".", $file["name"])[0];
            $rpName = str_replace($fileName, $_POST["newName"], $file["path"]);
            if ($fileName === $_POST["rename"] && file_exists($file["path"])) {
                rename($file["path"], $rpName);
                header("Location: ../index.php?renamed=true");
            }
        }
    }
    if (isset($_POST["open"])) {
        $currentPath = isset($_SESSION["currentPath"]) ? substr($_SESSION["currentPath"], 1)  : "./";
        $_SESSION["openFile"] = $currentPath . "/" . $_POST["open"];
        header("Location: ../index.php");
    }
