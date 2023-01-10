<?php

function getFilesAndFolders($directory)
{
    $all = glob("$directory/*");

    if (count($all) == 0) {
        echo "<div class='empty-root-folder-alert'>
                <p>You have not created any file or folder</p>
                <div class='empty-root-btns-container'>
                    <button id='createFolderBtn' class='create-folder-btn'>Create folder</button>
                    <button id='uploadFileBtn' class='upload-file-btn'>Upload file</button>
                </div>
            </div>";
    } else {
        echo "<div class='btns-container'>
                <button id='createFolderBtn' class='create-folder-btn'>Create folder</button>
                <button id='uploadFileBtn' class='upload-file-btn'>Upload file</button>
            </div>";
    }

    foreach ($all as $ff) {
        if (is_file($ff)) {
            $file = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($ff));
            echo "<div class='file-container'>
                <div class='file $ff[-1]$ff[-2]$ff[-3]'></div>
                <p>$file</p>
            </div>";
        }
        if (is_dir($ff)) {
            $dir = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($ff));
            echo "<div class='folder-container'>
                    <div class='folder'></div>
                    <p>$dir</p>
                    </div>";
        }
    }
}
