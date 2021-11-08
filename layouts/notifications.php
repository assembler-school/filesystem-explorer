<?php

function renderNotifications()
{
	require_once("./modules/session.php");

	$errorList = 		popSessionValue("errorList");
	$successList = 	popSessionValue("successList");
?>
	<?php if ($errorList) : ?>
		<?php foreach ($errorList as $error) : ?>
			<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
				<span><?= $error ?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endforeach ?>
	<?php endif ?>

	<?php if ($successList) : ?>
		<?php foreach ($successList as $success) : ?>
			<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
				<span><?= $success ?></span>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endforeach ?>
	<?php endif ?>

	<?php if (!$errorList && !$successList) : ?>
		<div class="alert alert-info mb-0 p-3 text-center" role="alert">There's no event!</div>
	<?php endif ?>

<?php
}

?>