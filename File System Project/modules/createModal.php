<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id=" exampleModalLabel">Create Folder or File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./createfolder.php" method="post">
                    <div class="row align-items-center mx-auto">
                        <div class="form-check col  mx-auto">
                            <input class="form-check-input" type="radio" value="createFolder" id="flexCheckDefault" name="create">
                            <label class="form-check-label" for="flexCheckDefault">
                                Create Folder
                            </label>
                        </div>
                        <div class="form-chec col mx-auto">
                            <input class="form-check-input" type="radio" value="createFile" id="flexCheckChecked" checked name="create">
                            <label class="form-check-label" for="flexCheckChecked">
                                Create File
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-center">File Name </label>
                            <input type="text" class="form-control" id="filename" name="filename" placeholder="myFolder / myFile" />
                        </div>
                        <div class="btn-group">
                            <select class="form-select" name="type" aria-label="Default select example">
                                <option value=".doc">.doc</option>
                                <option value=".csv">.csv</option>
                                <option value=".jpg">.jpg</option>
                                <option value=".png">.png</option>
                                <option selected value=".txt">.txt</option>
                                <option value=".ppt">.ppt</option>
                                <option value=".odt">.odt</option>
                                <option value=".pdf">.pdf</option>
                                <option value=".zip">.zip</option>
                                <option value=".rar">.rar</option>
                                <option value=".exe">.exe</option>
                                <option value=".svg">.svg</option>
                                <option value=".mp3">.mp3</option>
                                <option value=".mp4">.mp4</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                            <label class="form-label d-flex justify-content-center">File Root</label>
                            <select class="form-select" id="fileroot" name="fileroot" aria-label="Default select example">
                            <option value=''></option>
                            <?php 
                        $path="./root";
                        $dir = new DirectoryIterator($path);
                        foreach ($dir as $fileinfo) {
                            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                                $credentials = dirname($fileinfo);
                                $pathofFile=  $fileinfo->getFileInfo();
                                $Namesofolders= $fileinfo->getFilename();
                                echo "<option value='$Namesofolders'>$Namesofolders</option>";
                            }
                        }
                            ?>
                            </select>
                            <!-- <input type="text" class="form-control" id="fileroot" name="fileroot" placeholder="File Name " /> -->
                        </div>
                    <div class="modal-footer">
                        <button type="submit" name="createForF" class="btn btn-secondary col-6 mx-auto ">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>