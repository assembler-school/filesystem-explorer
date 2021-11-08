<?php

function renderSearch()
{
	require_once(ROOT . "/utils/url.php");
	require_once(ROOT . "/utils/getNAvLinks.php");

?>
		<div class="input-group">
			<form action="actions/search/index.php" method="GET" >
				<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
				aria-describedby="search-addon" />
				<button type="submit" class="btn btn-outline-primary">search</button>
			</form>
		</div>

<?php
}
