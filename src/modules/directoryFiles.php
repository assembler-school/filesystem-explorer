<?php
// Required files
require_once("./modules/fileStats.php");

// Root folder
$target_dir = $_SESSION["basePath"];
// $directoryFiles = $_SESSION["directoryFiles"];

// List all files
foreach (scandir($target_dir) as $i) {
    $firstCharacter = substr($i, 0, 1);
    if ($i != "..") {
        // Not show hidden folders
        if ($firstCharacter != ".") {
            $target_file = $target_dir . basename($i);
            $fileArray = getFileStats($target_file, $i);
            //$directoryFiles[] = $fileArray;

            // Creating the file block
            echo "<div class= 'row file-item d-flex justify-content-center align-items-center'>";
            echo "<div class='row col col-6 p-0 icon-and-name d-flex justify-content-between align-items-center'>";
            echo "<p class='col col-2 file-text file-icon p-0 d-flex justify-content-center'>";
            echo "<i class='far fa-" . $fileArray["icon"] . "'></i>";
            echo "</p>";
            echo "<p class='col col-10 file-text file-name'>" . $fileArray["name"] . "</p>";
            echo "</div>";
            // echo "<p class='col col-2 col file-text'>" . $fileArray["type"] . "</p>";
            // echo "<p class='file-text'>" . $fileArray["path"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["size"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["creation"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["modification"] . "</p>";
            echo "</div>";
        }
    }
};

/* -------------------------------------------------------------------------- */
/*                                    TEST                                    */
/* -------------------------------------------------------------------------- */
// echo "These are the directory files: <pre>" . print_r($directoryFiles, true) . "</pre>";

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