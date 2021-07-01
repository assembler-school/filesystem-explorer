<?php
require_once "../../php/Login/login-control.php";
revisar_si_existe_sesion();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File System Explorer</title>

	<!-- Script del CDN de Jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="main.css">

	<!-- Iconos traidos de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />

</head>

<body class="main_layout">
	<header class="d-flex flex-row justify-content-between main__header bg-light">
		<div class="logo__wrapper">
			<div class="logo__app">
				<img src="./../../../doc/img/RPC-JP_Logo.png
				" alt="">
			</div>
		</div>
		<div class="w-100 d-flex justify-content-center pt-2 pb-2 mb-3 h-100">
			<div class="d-flex flex-row gap-3 pt-2 pb-2 mb-3 h-100 search__component border border-secondary">
				<div class="d-flex justify-content-center align-item-center">
					<i class="fas fa-search"></i>
				</div>
				<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="search__bar--input" value="">
			</div>
			<div class="search__bar--main--container" id="search__bar--main--container">
				<p>

				</p>
			</div>
			<?php
					// require_once "../../php/search_bar/search_bar.php";
				?>
		</div>
		<div class="logout__wrapper d-flex justify-content-center align-item-center h-100 d-inline-block gap-3">
			<div class="d-flex align-items-center">
				<h5>Welcome <span class="text-primary"><?= $_SESSION["username"] ?></span></h5>
			</div>
			<div class=" d-flex align-items-center justify-content-center h-100">
				<div class="profile_picture">
					<img src='<?= $_SESSION["user_img"] ?>' alt="no user">
				</div>
			</div>
			<a href="../../php/login/logout.php" class="d-flex align-items-center">
				<button type="button" class="btn btn-primary">Logout</button>
			</a>
		</div>
	</header>
	<main class="main__container">
		<aside class="d-flex flex-column justify-content-between">
			<section id="menu" class="p-2 overflow-auto">
				<?php
				require_once "../../php/local_files/read_local_files.php";
				folders_init();
				?>
			</section>
			<div class="d-flex flex-column justify-content-evenly px-2 trash__wrapper">
				<?php
				if (isset($_GET["trash"])) echo "<div id='trash-id' class='d-flex align-items-center trash__select folder-active'>";
				else echo "<div id='trash-id' class='d-flex align-items-center trash__select'>";
				?>
				<i class="uil uil-trash-alt me-2"></i>
				<div>Trash</div>
			</div>
				<div class="d-flex justify-content-center">
					<?php
					get_total_size();
					?>
				</div>
			</div>
		</aside>
		<section class="main__files--wrapper">
			<nav class="edit__buttons--wrapper d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
				<div class="d-flex flex-row justify-content-between gap-3">
					<button class="btn btn-light border border-secondary">
						Create folder
					</button>
					<button class="btn btn-light border border-secondary">
						Upload file
					</button>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">
					<?php
					require "../../php/navbar_file_information/navbar_information.php";
					?>
				</div>
			</nav>
			<div class="files__wrapper">
				<div class="container-fluid folder_container">
					<div class="row row-cols-sm-2 row-cols-md-4 row-cols-lg-6">
						<?php
						read_local_folders();
						?>
					</div>
				</div>
				<div class="container-fluid file_container">
					<div class="row row-cols-sm-2 row-cols-md-4 row-cols-lg-6" id="file_container">
						<?php
						read_local_files();
						require_once "../modal-play/modal-play.php";
						?>
					</div>
				</div>
			</div>
		</section>
		<section class="section_modal" id="section_modal"></section>
	</main>
	<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="main.js"></script>
	<script src="../../php/search_bar/search_bar.js"></script>
</body>

</html>