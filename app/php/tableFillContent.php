<?php
include "fileBrowser.php";
include "getFileSize.php";

$id = 0;
foreach (fileBrowser() as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) !== "") {

        $fileName =  basename($file);
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileCreate =  date("Y-m-d H:m:s", filectime($file));
        $fileModify =  date("Y-m-d H:m:s", filemtime($file));
        $id++;

        echo ' <tr id="try-' . $id . '" data-file="' . $file . '">' .
            ' <td> <span id="' . $id . '">' . $fileName . ' </span></td> ' .
            ' <td> ' . $fileType . ' </td>' .
            ' <td> ' . $fileCreate . ' </td>' .
            ' <td> ' . $fileModify . ' </td>' .
            ' <td> ' . getFileSize($file) . ' </td>' .
            ' <td> ' . '<button id="deleteFile" data-file="' . $file . '">delete</button>' .
            '<button id="try" >try</button>' .
            '<button 
                            type="button"
                            class="btn btn-primary"
                            id="button-' . $fileName . '"
                            data-file="' . $fileName . '"
                        >
                            Rename file
                        </button>' .
            ' </td>' .
            '</tr> ';
        echo "<script>
                document.getElementById('button-" . $fileName . "')
                .addEventListener('click', ()=>{
                    handleEdit('" . $id . "','" . $file . "');
                })
            </script>";
    }
}
?>

<script>
    function handleEdit(cellId, file) {
        let $target = $('#' + cellId);
        $target.attr("contentEditable", true);
        $target.focus();
        $oldName = $target.text();
        $target.keyup((e) => {
            e.preventDefault()
            if (e.keyCode === 13) {
                $target.blur();
            }
        })
        $target.blur(() => {
            $newName = $target.text();
            $target.removeAttr('contentEditable');
            newName($oldName, $newName, file);
        })
    }

    $(document).ready(function() {
        $("#try").click(function(e) {
            console.log(e.target.parentElement.parentElement.id)
            console.log(e.target.parentElement.parentElement.dataset.file)
        });


        $("#deleteFile").click(function(e) {
            let fileUrl = e.target.parentElement.parentElement.dataset.file;

            $.ajax({
                url: "../../app/php/deleteFile.php",
                type: "post",
                data: {
                    filePath: fileUrl
                },
                success: function(response) {
                    if (response) {
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

    function newName(oldName, newName, file) {
        $.ajax({
            url: "../../app/php/renameFile.php",
            type: "post",
            data: {
                oldName: oldName,
                newName: newName,
                file: file
            },
            success: function(response) {
                if (response) {
                    console.log(response)
                }
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
    }
</script>