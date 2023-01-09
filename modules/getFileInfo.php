<?php

function getFileInfo()
{
    echo "
    <div class='file-details-container'>
        <img class='extension-img' src='extensionImage' alt='extension-img'/>
        <div class='file-details-container-items'> 
            <p class='file-details-item'>File name</p>
            <p class='file-details-item'>Size</p>
            <p class='file-details-item'>Last update</p>
            <p class='file-details-item'>Created</p>
        </div>
    </div>
        
    <div class='file-content-container'>
        <p>Content</p>
        <div>Content of file</div>
    </div>
            ";
};
