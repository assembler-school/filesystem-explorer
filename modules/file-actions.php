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
    $fileToDownload = isset($_POST["download"]) ? $_POST["download"] : null;

    function removeDirectory($path)
    {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }

    if (isset($_POST["delete"])) {
        $fileToDelete = $_POST["delete"];
        $currentPath = isset($_SESSION["currentPath"]) ? substr($_SESSION["currentPath"], 1)  : "./";
        $fullPath = "../root/" . $currentPath . "/" . $fileToDelete;
        if (is_file($fullPath)) {
            unlink($fullPath);
        } else {
            removeDirectory($fullPath);
        }
        header("Location: ../index.php");
        // foreach ($filesList as $file) {
        //     if (is_file($file["path"]) && $file["name"] === $fileToDelete && file_exists($file["path"])) {
        //         unlink($file["path"]);
        //          header("Location: ../index.php?deleted=true");
        //     } elseif (is_dir($file["path"]) && $file["name"] === $fileToDelete && file_exists($file["path"])) {
        //         removeDirectory($file["path"]);
        //        header("Location: ../index.php?deleted=true");
        //     }
        // }
    } elseif (isset($_POST["rename"]) && isset($_POST["newName"])) {
        $fileToRename = $_POST["rename"];
        $currentPath = isset($_SESSION["currentPath"]) ? substr($_SESSION["currentPath"], 1)  : "./";
        $fullPath = "../root/" . $currentPath . "/" . $fileToRename;
        if (is_file($fullPath)) {
            $fileExtension = explode('.', $fileToRename)[1];
            $newFileName = "../root/" . $currentPath . "/" . $_POST["newName"] . "." . $fileExtension;
            if (!file_exists($newFileName)) {
                rename($fullPath, $newFileName);
                header("Location: ../index.php?renamed=true");
            } else {
                // TODO some error.
                echo "error";
            }
        } else {
            $newFileName = "../root/" . $currentPath . "/" . $_POST["newName"];
            if (!file_exists($newFileName)) {
                rename($fullPath, $newFileName);
                header("Location: ../index.php?renamed=true");
            } else {
                // TODO some error.
                echo "error";
            }
        }

        /* foreach ($filesList as $file) {
            $fileName = explode(".", $file["name"])[0];
            $rpName = str_replace($fileName, $_POST["newName"], $file["path"]);
            if ($fileName === $_POST["rename"] && file_exists($file["path"])) {
                rename($file["path"], $rpName);
                header("Location: ../index.php?renamed=true");
            }
        } */
    } elseif (isset($fileToDownload)) {
        foreach ($filesList as $file) {
            if ($file["name"] === $fileToDownload && file_exists($file["path"])) {
                header('Content-Description: File Transfer');
                header("Content-Type: application/octet-stream");
                header("Content-Length: " . filesize($file["path"]));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header("Content-Disposition: attachment; filename=" . $file["name"]);
                ob_clean();
                flush();
                readfile($file["path"]);
                exit;
            } else {
                echo "File path does not exist.";
            }
        }
    } elseif (isset($_POST["open"])) {
        $currentPath = isset($_SESSION["currentPath"]) ? substr($_SESSION["currentPath"], 1)  : "./";
        $_SESSION["openFile"] = $currentPath . "/" . $_POST["open"];
        header("Location: ../index.php");
    }
