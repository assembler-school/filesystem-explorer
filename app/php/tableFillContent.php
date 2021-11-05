<?php
include "fileBrowser.php";
include "getFileSize.php";

foreach (fileBrowser() as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) !== "") {

        $fileName =  basename($file);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileCreate =  date("Y-m-d H:m:s", filectime($file));
        $fileModify =  date("Y-m-d H:m:s", filemtime($file));

        echo ' <tr>' .
            ' <td> ' . $fileName . ' </td> ' .
            ' <td> ' . $fileType . ' </td>' .
            ' <td> ' . $fileCreate . ' </td>' .
            ' <td> ' . $fileModify . ' </td>' .
            ' <td> ' . getFileSize($file) . ' </td>' .
            ' <td> ' . '<button id="deleteFile" data-file="'.$file.'">delete</button>' .
                        '<button type="button" class="btn btn-primary" data-bs-toggle="modal" id="'.$file.'" data-bs-target="#renameModal" data-file="'.$file.'">
                            Rename file
                        </button>'. 
            ' </td>' .
            '</tr> ';
            $newFile = "'#".$file."'";
            echo $newFile;
            echo "<script> 
                $({$newFile}).click(function(e){
                    alert('helloe');
                })
            </script>";
    }
}
?>

<script>
    $(document).ready(function() {
        $("#deleteFile").click(function(e){
            let fileUrl= e.target.dataset.file;

            $.ajax({
                url: "../../app/php/deleteFile.php",
                type:"post",
                data: {filePath: fileUrl},
                success: function(response) {
                    if(response) {
                        Swal.fire({
                        icon: "success",
                        title: "File deleted",
                        showConfirmButton: false,
                        timer: 1500,
                        });
                        loadTable();
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        });
                    }
                }
            })
        })
    })
    $(document).ready(function(){
        $("#renameFile").click(function(e){
            let fileUrl=e.target.dataset.file;

            $.ajax({
                url:"../../app/php/renameFile.php",
                type:"post",
                data: {filePath:fileUrl},
                success: function(response) {
                    // if(response) {
                    //     Swal.fire({
                    //     icon: "success",
                    //     title: "File renamed",
                    //     showConfirmButton: false,
                    //     timer: 1500,
                    //     });
                    //     loadTable();
                    // } else {
                    //     Swal.fire({
                    //     icon: "error",
                    //     title: "Oops...",
                    //     text: "Something went wrong!",
                    //     });
                    // }
                }
            })
        })
    })

</script>
