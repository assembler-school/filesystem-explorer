<?php

function renderModalUploadFiles()
{
	$id = "modalUploadFiles";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h5 class="modal-title">Upload Files</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<form action="actions/uploadFiles/index.php" method="POST" enctype="multipart/form-data">
							<label class="form-label w-100" for="input_destpath">Destination path</label>
							<input class="form-control mb-3" type="text" name="destpath" id="input_destpath" placeholder="/" value="<?= isset($_GET["path"]) ? $_GET["path"] : "" ?>" />
							<label class="form-label w-100" for="input_files">Files</label>
							<div class="input-group mb-3">
								<label class="input-group-text">Upload</label>
								<input type="file" class="form-control" id="input_files" name="files[]" multiple required>
							</div>
							<button class="btn btn-primary" type="submit">Upload</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
