<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File System Explorer</title>
	<link rel="stylesheet" href="./main.css">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">

	<!-- Iconos traidos de Font Awesome -->
	<link
	rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
	integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
	crossorigin="anonymous"
	/>

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
				<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
			</div>
		</div>
		<div class="logout__wrapper d-flex justify-content-center align-item-center h-100 d-inline-block">
			<a href="../Login/logout.php" class="d-flex align-items-center">
				<button type="button" class="btn btn-primary">Logout</button>
			</a>
		</div>
	</header>
	<main class="main__container">
		<aside class="d-flex flex-column justify-content-between">
			<section class="h-25">
				carpetas
			</section>
			<div class="trash__wrapper">
				trash
			</div>
		</aside>
		<section class="main__files--wrapper">
			<nav class="edit__buttons--wrapper d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
				<div class="d-flex flex-row justify-content-between gap-3">
					<button class="btn btn-light border border-secondary">
						Upload File
					</button>
					<button class="btn btn-light border border-secondary">
						New file
					</button>
				</div>
				<div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Name</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Size</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              Fecha
            </button>
          </div>
			</nav>
			<div class="files__wrapper">
			<div class="container-fluid">
				<div class="row row-cols-sm-2 row-cols-md-4 row-cols-lg-6">
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>
					<div class="col d-flex justify-content-center align-items-center">
						<section class="file__item--wrapper d-flex flex-column align-items-center">
							<div>
								<img src="./../../../doc/img/folder-invoices--v1.png" alt="">
							</div>
							<div>
								<h6>
									titulo de la carpeta
								</h6>
							</div>
						</section>
					</div>

				</div>
			</div>
		</section>
	</main>
	<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
