<?php

function renderModalRename()
{
	$id = "modalRename";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h5 class="modal-title">Rename</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<form action="./actions/renameFile/index.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
                <input type="hidden" name="action" value="rename">
								<input type="hidden" class="input_rename_path" name="currentPath" />
                <input type="text" class="input_rename_path" name="newPath">
                <input type="hidden" name="userLocation" value="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>index.php" />
								<!-- TODO: Add input text for the new name of the file or folder -->
								<!-- TODO: Add input type="hidden" with the value of the "path" of the file or folder to be renamed -->
								<button class="btn btn-primary" type="submit">Modify</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
