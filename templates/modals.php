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
