<?php
// Required files
require_once("./fileStats.php");

// Root folder
$target_dir = $_SESSION["basePath"];
$directoryFiles = $_SESSION["directoryFiles"];

// List all files
foreach (scandir($target_dir) as $i) {
    $firstCharacter = substr($i, 0, 1);
    if ($i != "..") {
        // Not show hidden folders
        if ($firstCharacter != ".") {
            $target_file = $target_dir . basename($i);
            $fileArray = getFileStats($target_file, $i);
            $directoryFiles[] = $fileArray;
            // echo $i, "<br>";
        }
    }
};

/* -------------------------------------------------------------------------- */
/*                                    TEST                                    */
/* -------------------------------------------------------------------------- */
echo "These are the directory files: <pre>" . print_r($_SESSION["allFiles"], true) . "</pre>";
echo "<a href='../index.php'>Back home</a>";



?>
<script>
    // $(".ajax-test").click(function() {
    //     $.ajax({
    //         method: "POST",
    //         url: "./modules/test.php",
    //         data: {
    //             path: "hey"
    //         }
    //     }).done(function(data) {
    //         console.log("Hello ajax");
    //         // <?php
                    //             // header("Location:src/$data");
                    //             // 
                    //             
                    ?>
    //     })
    // });
</script>