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

        echo ' <tr id="' . $id . '" data-file="' . $file . '">' .
            ' <td> <span id="name-' . $id . '">' . $fileName . ' </span></td> ' .
            ' <td> ' . $fileType . ' </td>' .
            ' <td> ' . $fileCreate . ' </td>' .
            ' <td> ' . $fileModify . ' </td>' .
            ' <td> ' . getFileSize($file) . ' </td>' .
            ' <td> ' .
            '<button id="deleteFile">delete</button>' .
            '<button id="renameFile"> Rename </button>' .
            ' </td>' .
            '</tr> ';
    }
}
?>

<script>
    $(document).ready(function() {
        $("#renameFile").click(function(e) {
            $id = e.target.parentElement.parentElement.id;
            $file = e.target.parentElement.parentElement.dataset.file
            console.log('#name-' + $id)
            let $target = $('#name-' + $id);
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
                ajaxRename($oldName, $newName, $file);
            })
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

    function ajaxRename(oldName, newName, file) {
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