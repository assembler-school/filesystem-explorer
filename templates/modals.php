<!-- Modal -->
<?php
function deleteModal()
{
    echo ("<div class='modal fade' id='deleteModal' tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel'>Delete file</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        Are you sure you want to delete the file <b id='deleteFileName'></b>?
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                        <form class='' method='POST' action='./modules/file-actions.php'>
                            <button type='submit' class='btn btn-danger' name='delete' value='' id='deleteButton'>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>");
}
function renameModal()
{
    echo ("<div class='modal fade' id='renameModal' tabindex='-1' aria-labelledby='renameModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='renameModalLabel'>Rename file</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <form class='' method='POST' action='./modules/file-actions.php'>
                        <div class='modal-body'>
                            <label for='newName' class='form-label'> New name for <b id='renameFileName'></b>:</label>
                            <input type='text' class='form-control' id='newName' name='newName'>
                            <div id='renameHelpBlock' class='form-text'>
                                Please don't include the extension for the file
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            <button type='submit' class='btn btn-primary' name='rename' value='' id='renameButton'>Rename</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>");
}
