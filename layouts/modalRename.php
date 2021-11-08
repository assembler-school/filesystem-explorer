<?php

function renderModalRename()
{
	$id = "modalRename";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Rename</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<form action="rename.action.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" id="input_rename_path" />
								<!-- TODO: Add input text for the new name of the file or folder -->
								<!-- TODO: Add input type="hidden" with the value of the "path" of the file or folder to be renamed -->
								<button class="btn btn-primary" type="submit">Rename</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
