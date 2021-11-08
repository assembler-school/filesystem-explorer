<?php

function renderModalAddFile()
{
	$id = "modalAddFile";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add file</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<form class="p-2 m-2 d-flex flex-column align-items-center" style="width: 20rem" action="createFile.action.php" method="POST">
							<label class="form-label w-100" for="input_filename">File name</label>
							<input class="form-control mb-3" type="text" name="filename" id="input_filename" required placeholder="File name" />
							<label class="form-label w-100" for="input_destpath">Destination path</label>
							<input class="form-control mb-3" type="text" name="destpath" id="input_destpath" placeholder="/" />
							<button class="btn btn-primary" type="submit">Create File</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
