<?php

function renderBreadcrumbs()
{
	require_once(ROOT . "/utils/url.php");
	require_once(ROOT . "/utils/getNAvLinks.php");

	if ($folderPath = getUrlFolderPath())	$links = getNavLinks($folderPath);
?>
	<nav class="table text-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item"><a href="index.php">Root</a></li>

			<?php foreach ($links as $link) : ?>
				<li class="breadcrumb-item"><a href="index.php?page=<?= $link["href"] ?>"><?= $link["name"] ?></a></li>
			<?php endforeach ?>
		</ol>
	</nav>
<?php
}
