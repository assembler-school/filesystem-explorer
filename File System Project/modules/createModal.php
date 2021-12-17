<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id=" exampleModalLabel">Create Folder or File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row align-items-center mx-auto">
                        <div class="form-check col  mx-auto">
                            <input class="form-check-input" type="radio" value="" id="flexCheckDefault" name="createType">
                            <label class="form-check-label" for="flexCheckDefault">
                                Create Folder
                            </label>
                        </div>
                        <div class="form-chec col mx-auto">
                            <input class="form-check-input" type="radio" value="" id="flexCheckChecked" checked name="createType">
                            <label class="form-check-label" for="flexCheckChecked">
                                Create File
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-center">File Name </label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="myFolder / myFile" />
                        </div>
                        <div class="btn-group">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value=".doc">One</option>
                                <option value=".">.csv</option>
                                <option value="3">.jpg</option>
                                <option value="1">.png</option>
                                <option value="2">.txt</option>
                                <option value="3">.ppt</option>
                                <option value="1">.odt</option>
                                <option value="2">.pdf</option>
                                <option value="3">.zip</option>
                                <option value="1">.rar</option>
                                <option value="2">.exe</option>
                                <option value="3">.svg</option>
                                <option value="1">.mp3</option>
                                <option value="2">.mp4</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary col-6 mx-auto ">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>