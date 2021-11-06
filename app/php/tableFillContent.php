<?php
include "utils/fileBrowser.php";
include "utils/getFileSize.php";

$id = 0;
foreach (fileBrowser() as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) !== "") {

        $fileName =  explode('.', basename($file))[0];
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $fileCreate =  date("Y-m-d H:m:s", filectime($file));
        $fileModify =  date("Y-m-d H:m:s", filemtime($file));
        $id++;

        echo ' <tr id="' . $id . '" data-file="' . $file . '">' .
            ' <td> <p id="name-' . $id . '" >' . $fileName . ' </p></td> ' .
            ' <td> ' . $fileType . ' </td>' .
            ' <td> ' . $fileCreate . ' </td>' .
            ' <td> ' . $fileModify . ' </td>' .
            ' <td> ' . getFileSize($file) . ' </td>' .
            ' <td> ' .
            '<button id="showFile"class="btn btn-light  m-1">▶️ </button>' .
            '<button id="renameFile"class="btn btn-light  m-1">✏️ </button>' .
            '<button id="deleteFile" class="btn btn-light m-1">❌</button>' .
            ' </td>' .
            '</tr> ';
    }
}
?>

<script>
    $(document).ready(function() {
        //?eventListener Rename
        $("#renameFile").click(function(e) {
            $id = e.target.parentElement.parentElement.id;
            $file = e.target.parentElement.parentElement.dataset.file
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

        //?eventListener Delete
        $("#deleteFile").click(function(e) {
            $fileUrl = e.target.parentElement.parentElement.dataset.file;
            ajaxDelete($fileUrl);
        })
    })
</script>