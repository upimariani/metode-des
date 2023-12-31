<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DOKTER | PUSKESMAS DTP TALAGA</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('asset/admin/src/') ?>assets/images/logos/favicon.png" />
	<link rel="stylesheet" href="<?= base_url('asset/admin/src/') ?>assets/css/styles.min.css" />
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
						<!-- <li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('Dokter/cDashboard') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-layout-dashboard"></i>
								</span>
								<span class="hide-menu">Dashboard</span>
							</a>
						</li> -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">PEMERIKSAAN</span>
						</li>
						<?php
						$notifikasi = $this->db->query("SELECT COUNT(id_boking) as notif FROM `boking_jdwl` JOIN jdwl_dokter ON jdwl_dokter.id_jadwal=boking_jdwl.id_jadwal JOIN dokter ON jdwl_dokter.id_dokter=dokter.id_dokter WHERE stat_boking='1' AND dokter.id_dokter='" . $this->session->userdata('id_dokter') . "'")->row();

						?>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('Dokter/cPemeriksaan') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-user"></i>
								</span>
								<span class="hide-menu">PEMERIKSAAN PASIEN</span><?php if ($notifikasi->notif != '0') {
																					?>
									<span class="badge bg-warning"><?= $notifikasi->notif ?></span>
								<?php
																					} ?>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="<?= base_url('Dokter/cPemeriksaanSelesai') ?>" aria-expanded="false">
								<span>
									<i class="ti ti-users"></i>
								</span>
								<span class="hide-menu">PEMERIKSAAN SELESAI</span>

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