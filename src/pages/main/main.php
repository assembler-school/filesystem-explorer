<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File System Explorer</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="main.css">
</head>

<body class="main_layout">
	<header class="d-flex flex-row justify-content-between">
		<div class="logo__wrapper">
			logo
		</div>
		<div class="w-100">
			buscador
		</div>
		<div class="logout__wrapper">
			button
		</div>
	</header>
	<main class="main__container">
		<aside class="d-flex flex-column justify-content-between">
			<section id="menu" class="h-100 p-2 overflow-auto">
				<li>
					<input type="checkbox" name="list" id="folder_1">
					<label class="d-flex align-items-center" for="folder_1">
						<i class="uil uil-folder me-2"></i>
						<div>folder 1</div>
					</label>
					<ul class="interior">
						<li>
							<input type="checkbox" name="list" id="folder_1.1">
							<label class="d-flex align-items-center" for="folder_1.1">
								<i class="uil uil-folder me-2"></i>
								<div>folder 1.1</div>
							</label>
							<ul class="interior">
								<li>
									<input type="checkbox" name="list" id="folder_1.1.1">
									<label class="d-flex align-items-center" for="folder_1.1.1">
										<i class="uil uil-folder me-2"></i>
										<div>folder 1.1.1</div>
									</label>
									<ul class="interior">
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<input type="checkbox" name="list" id="folder_2">
					<label class="d-flex align-items-center" for="folder_2">
						<i class="uil uil-folder me-2"></i>
						<div>folder 2</div>
					</label>
					<ul class="interior">
						<li>
							<input type="checkbox" name="list" id="folder_2.1">
							<label class="d-flex align-items-center" for="folder_2.1">
								<i class="uil uil-folder me-2"></i>
								<div>folder 2.1</div>
							</label>
							<ul class="interior">
								<li>
									<input type="checkbox" name="list" id="folder_2.1.1">
									<label class="d-flex align-items-center" for="folder_2.1.1">
										<i class="uil uil-folder me-2"></i>
										<div>folder 2.1.1</div>
									</label>
									<ul class="interior">
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<input type="checkbox" name="list" id="folder_2.2">
							<label class="d-flex align-items-center" for="folder_2.2">
								<i class="uil uil-folder me-2"></i>
								<div>folder 2.2</div>
							</label>
							<ul class="interior">
							</ul>
						</li>
					</ul>
				</li>
			</section>
			<div class="d-flex flex-column justify-content-evenly px-2 trash__wrapper">
				<div class="d-flex align-items-center trash__select">
					<i class="uil uil-trash-alt me-2"></i>
					<div>Trash</div>
				</div>
				<div class="d-flex justify-content-center">
					<div>Storage: 12GB of 50GB</div>
				</div>
			</div>
		</aside>
		<section>
			<nav class="d-flex flex-row justify-content-between">
				<div>
					butons
				</div>
				<div>
					butons
				</div>
			</nav>
			<div class="files_wrapper">
				Contenedor de carpetas
			</div>
		</section>
	</main>
	<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>