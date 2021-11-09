<?php

function renderAside()
{
	require_once(ROOT."/layouts/notifications.php");
	require_once(ROOT."/layouts/navigationTree.php");
?>
	<aside class="aside-nav">
		<div class="accordion accordion-flush">
			<div>
				<button class="aside-nav__button aside-nav__button--accordion collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-1" aria-expanded="false" aria-controls="flush-collapse-1">
					<div class="d-flex align-items-center gap-2">
						<span class="material-icons">add_circle</span>
						<span class="fw-light">Add</span>
					</div>
				</button>
				<div id="flush-collapse-1" class="accordion-collapse collapse" aria-labelledby="flush-heading-1">
					<div class="accordion-body p-0">
						<div class="list-group-flush">
							<button data-bs-toggle="modal" data-bs-target="#modalAddFolder" class="list-group-item list-group-item-action fw-light d-flex align-items-center gap-2"><span class="material-icons">folder</span><span>New folder</span></button>
							<button data-bs-toggle="modal" data-bs-target="#modalAddFile" class="list-group-item list-group-item-action fw-light d-flex align-items-center gap-2"><span class="material-icons">description</span><span>New file</span></button>
						</div>
					</div>
				</div>
			</div>
			<button data-bs-toggle="modal" data-bs-target="#modalUploadFiles" class="aside-nav__button" type="button">
				<div class="d-flex align-items-center gap-2">
					<span class="material-icons">cloud_upload</span>
					<span class="fw-light">Upload files</span>
				</div>
			</button>
		</div>
		<div>
			<button class="aside-nav__button aside-nav__button--accordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-2" aria-expanded="true" aria-controls="flush-collapse-1">
				<div class="d-flex align-items-center gap-2">
					<span class="material-icons">notifications</span>
					<span class="fw-light">Notifications</span>
				</div>
			</button>
			<div id="flush-collapse-2" class="accordion-collapse collapse show" aria-labelledby="flush-heading-2">
				<div class="accordion-body p-2">
					<div class="list-group-flush">
						<?php renderNotifications(); ?>
					</div>
				</div>
			</div>
			<?php renderNavTree(); ?>
		</div>
	</aside>
<?php
}
