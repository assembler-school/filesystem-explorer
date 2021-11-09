<?php

function renderTable()
{
	require_once(ROOT . "/utils/url.php");
	require_once(ROOT . "/utils/getFolderContent.php");
	require_once(ROOT . "/utils/searchInDrive.php");


	if ($folderPath = getUrlFolderPath())
		$contents =	isset($_SESSION['QUERY']) ? ($_SESSION["QUERY"]) : getFolderContent($folderPath);

	// contents tmb puede ser del search
	// usar session, query
	// que cuando se haga el submit redirija al index de nuevo
	//y una vez se replique la tabla que haga unset de $_SESSION['search']
?>
	<div class="main-child text-light">
		<?php if ($contents) : ?>
			<table id="contents" class="table text-light w-100">
				<thead>
					<tr>
						<th></th>
						<th>Name</th>
						<th>Type</th>
						<th>Size</th>
						<th>Last access date</th>
						<th>Last modification date</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents["files"] as $file) : ?>
						<tr>
							<td><img src="./assets/images/extensions/<?= $file["type"] ?>-svgrepo-com.svg" width="32" alt="<?= $file["type"] ?>" /></td>
							<td><?= $file["name"] ?></td>
							<td><?= $file["type"] ?></td>
							<td><?= $file["size"] ?></td>
							<td><?= $file["modtime"] ?></td>
							<td><?= $file["acctime"] ?></td>
							<td>
								<div class="d-flex align-items center gap-2">
									<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalDelete" data-action="delete" data-payload="<?= $file["path"] ?>">
										<span class="material-icons" style="pointer-events: none">
											delete
										</span>
									</button>
									<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalRename" data-action="rename" data-payload="<?= $file["path"] ?>">
										<span class="material-icons" style="pointer-events: none">
											drive_file_rename_outline
										</span>
									</button>
									<?php if (in_array($file["type"], ["svg", "jpg", "jpeg", "png"])) : ?>
										<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalView" data-action="view-image" data-payload="<?= $file["path"] ?>">
											<span class="material-icons" style="pointer-events: none">
												image
											</span>
										</button>
									<?php endif ?>
									<?php if (in_array($file["type"], ["mp4"])) : ?>
										<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalView" data-action="view-video" data-payload="<?= $file["path"] ?>">
											<span class="material-icons" style="pointer-events: none">
												smart_display
											</span>
										</button>
									<?php endif ?>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($contents["folders"] as $folder) : ?>
						<tr>
							<td><img src="./assets/images/extensions/folder-svgrepo-com.svg" width="32" alt="folder" /></td>
							<td><?= $folder["name"] ?></td>
							<td><?= $folder["size"] ?></td>
							<td>Folder</td>
							<td><?= $folder["modtime"] ?></td>
							<td><?= $folder["acctime"] ?></td>
							<td>
								<div class="d-flex align-items center gap-2">
									<?php if (!in_array($folder["name"], [".", ".."])) : ?>
										<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalDelete" data-action="delete" data-payload="<?= $folder["path"] ?>">
											<span class="material-icons" style="pointer-events: none">
												delete
											</span>
										</button>
										<button class="icon-btn" data-bs-toggle="modal" data-bs-target="#modalRename" data-action="rename" data-payload="<?= $folder["path"] ?>">
											<span class="material-icons" style="pointer-events: none">
												drive_file_rename_outline
											</span>
										</button>
									<?php endif ?>
									<a href="index.php?path=<?= $folder["path"] ?>">
										<span class="material-icons">
											north_east
										</span>
									</a>
								</div>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php else : ?>
			<div class="d-flex justify-content-center align-items-center p-3 bg-white border-bottom">
				<span class="text-dark">Oops! Something went wrong :(</span>
			</div>
		<?php endif ?>
	</div>
	<script>
		$.extend(true, $.fn.dataTable.defaults, {
			"searching": false,

		});

		$(document).ready(function() {
			$('#contents').DataTable({
				columnDefs: [{
					targets: [0, -1],
					orderable: false,
				}]
			});
		});
	</script>
<?php
	unset($_SESSION['QUERY']);
	unset($_SESSION['search']);
}
