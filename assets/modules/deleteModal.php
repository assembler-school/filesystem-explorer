<!-- Delete Modal -->
<div class='position-fixed vw-100 vh-100 bg-dark modal-shadow hidden' id='shadowDelete'></div>
<div class='modal-form-delete position-fixed p-3 rounded bg-secondary hidden' id='formDelete'>
    <div class="d-flex space-between justify-content-between">
        <h3 class='text-white'>Delete element</h3>
        <svg class='text-white btn-x' role='img' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
        </svg>
    </div>
    <hr class='text-white' />
    <form method='POST' action='./src/delete.php' class="d-flex flex-column text-white">
        <p>Are you sure you want to delete this element?</p>
        <input type='text' id='deleteNameInput' name='deleteNameInput' class='hidden' readonly>
        <div>
            <button type='button' id='modalDeleteCancel' class='btn btn-danger'>CANCEL</button>
            <input type='submit' class='btn btn-dark' value="YES">
        </div>
    </form>
</div>