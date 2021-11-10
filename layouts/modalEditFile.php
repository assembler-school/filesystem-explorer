<?php

function renderModalEditFile()
{
	$id = "modalEditFile";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h5 class="modal-title">Edit file</h5>
					<button id="clodeEditModal" type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column justify-content-center align-items-center">
					<form id="formEditFile">
            <textarea id="dataFile"></textarea>
            <input type="submit" value="Save">
          </form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
