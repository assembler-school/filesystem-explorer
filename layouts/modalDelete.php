<?php


function renderModalDelete()
{
	$id = "modalDelete";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Delete</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
						<form action="deleteDirectory.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input name="path" type="text" id="input_delete_path" />
								<!-- TODO: Add confirmation question about to delete the file or folder -->
								<!-- TODO: Add input type="hidden" with the value of the "path" of the file or folder to remove -->
								<button class="btn btn-primary" type="submit">Delete</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
