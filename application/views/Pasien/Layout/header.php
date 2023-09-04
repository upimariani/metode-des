<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">

	<title>PASIEN | PUSKESMAS DTP TALAGA</title>

	<!-- CSS FILES -->
	<link href="<?= base_url('asset/pasien/') ?>css/bootstrap.min.css" rel="stylesheet">

	<link href="<?= base_url('asset/pasien/') ?>css/bootstrap-icons.css" rel="stylesheet">

	<link href="<?= base_url('asset/pasien/') ?>css/templatemo-kind-heart-charity.css" rel="stylesheet">
	<!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">

	<header class="site-header">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-12 d-flex flex-wrap">
					<p class="d-flex me-4 mb-0">
						<i class="bi-geo-alt me-2"></i>
						Jl. Jenderal Ahmad Yani No.21, Talagawetan, Kec. Talaga, Kabupaten Majalengka
					</p>

					<p class="d-flex mb-0">
						<i class="bi-envelope me-2"></i>

						<a href="mailto:info@company.com">
							puskesmasdtp@gmail.com
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
					<ul class="social-icon">
						<li class="social-icon-item">
							<a href="https://www.facebook.com/uptdpuskesmas.dtptalaga" class="social-icon-link bi-facebook"></a>
						</li>
						<li class="social-icon-item">
							<a href="https://instagram.com/uptd_puskesmastalaga?igshid=MzRlODBiNWFlZA" class="social-icon-link bi-instagram"></a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</header>
	<nav class="navbar navbar-expand-lg bg-light shadow-lg">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<span>
					PUSKESMAS DTP TALAGA
					<small>Kec. Talaga, Kab. Majalengka</small>
				</span>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('Pasien/cHome') ?>">Home</a>
					</li>
					<?php
					if ($this->session->userdata('id_pasien') != '') {
					?>
						<li class="nav-item">
							<a class="nav-link click-scroll" href="#">Selamat Datang, <?= $this->session->userdata('nama') ?></a>
						</li>
					<?php
					}
					?>
					<?php
					if ($this->session->userdata('id_pasien') != '') {
					?>
						<li class="nav-item ms-3">
							<a class="nav-link custom-btn custom-border-btn btn" href="<?= base_url('Pasien/cLogin/logout') ?>">LOGOUT</a>
						</li>
					<?php
					} else {
					?>
						<li class="nav-item ms-3">
							<a class="nav-link custom-btn custom-border-btn btn" href="<?= base_url('Pasien/cLogin') ?>">LOGIN</a>
						</li>
					<?php
					}
					?>




				</ul>
			</div>
		</div>
	</nav>