<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APOTEK | PUSKESMAS DTP TALAGA</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('asset/admin/src/') ?>assets/images/logos/favicon.png" />
	<link rel="stylesheet" href="<?= base_url('asset/admin/src/') ?>assets/css/styles.min.css" />
	<link href="<?= base_url('asset/datatables') ?>/datatables.min.css" rel="stylesheet">
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<!-- Sidebar Start -->
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div>
				<div class="brand-logo d-flex align-items-center justify-content-between">
					<a href="./index.html" class="text-nowrap logo-img">
						<img src="<?= base_url('asset/logo.jpg') ?>" width="200" alt="" />
					</a>
					<div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
						<i class="ti ti-x fs-8"></i>
					</div>
				</div>
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
					<ul id="sidebarnav">
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">OBAT</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('Apotek/cObat') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-pill"></i>
								</span>
								<span class="hide-menu">DATA OBAT</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('Apotek/cResepObat') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-receipt"></i>
								</span>
								<span class="hide-menu">RESEP PASIEN</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">AUTH</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('cLogin/logout') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-login"></i>
								</span>
								<span class="hide-menu">LOGOUT</span>
							</a>
						</li>

					</ul>

				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
