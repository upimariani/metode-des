<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REKAM MEDIS | PUSKESMAS DTP TALAGA</title>
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
							<img src="<?= base_url('asset/admin/src/') ?>assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle"><span class="hide-menu"> <strong><?= $this->session->userdata('nama_user') ?></strong></span>
							<hr>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cDashboard') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-layout-dashboard"></i>
								</span>
								<span class="hide-menu">Dashboard</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">ANALISIS METODE DES</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cAnalisis') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-align-box-bottom-right"></i>
								</span>
								<span class="hide-menu">ANALISIS PENYAKIT</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cAnalisisPerDesa') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-archive"></i>
								</span>
								<span class="hide-menu">PER DESA</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cAnalisisPerJk') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-chart-pie"></i>
								</span>
								<span class="hide-menu">PER JENIS KELAMIN</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cAnalisisPerUmur') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-number"></i>
								</span>
								<span class="hide-menu">PER UMUR</span>
							</a>
						</li>
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">HISTORY PASIEN</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('RekamMedis/cHistory') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-air-balloon"></i>
								</span>
								<span class="hide-menu">HISTORY PEMERIKSAAN</span>
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
