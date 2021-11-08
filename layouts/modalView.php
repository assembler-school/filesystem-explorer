<?php

function renderModalView()
{
	$id = "modalView";
?>
	<div class="modal fade" id="<?= $id ?>" tabindex="-1" aria-labelledby="<?= $id ?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div id="view-file" class="d-flex flex-column justify-content-center align-items-center">

					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
