<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN USER | PUSKESMAS DTP TALAGA</title>
	<link rel="shortcut icon" type="image/png" href="<?= base_url('asset/admin/src/') ?>assets/images/logos/favicon.png" />
	<link rel="stylesheet" href="<?= base_url('asset/admin/src/') ?>assets/css/styles.min.css" />
</head>

<body>
	<!--  Body Wrapper -->
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
			<div class="d-flex align-items-center justify-content-center w-100">
				<div class="row justify-content-center w-100">
					<div class="col-md-6 col-lg-6 col-xxl-3">
						<div class="card mb-0">
							<div class="card-body">
								<a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
									<img src="<?= base_url('asset/logo.jpg') ?>" width="280" alt="">
								</a>
								<?php
								if ($this->session->userdata('success')) {
								?>
									<div class="alert alert-success alert-dismissible" role="alert">

										<div class="alert-icon">
											<i class="zmdi zmdi-notifications-none"></i>
										</div>
										<div class="alert-message">
											<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
										</div>
									</div>
								<?php
								}
								?>
								<?php
								if ($this->session->userdata('error')) {
								?>
									<div class="alert alert-danger alert-dismissible" role="alert">

										<div class="alert-icon">
											<i class="zmdi zmdi-notifications-none"></i>
										</div>
										<div class="alert-message">
											<strong>Gagal!</strong> <?= $this->session->userdata('error') ?>
										</div>
									</div>
								<?php
								}
								?>
								<form action="<?= base_url('cLogin') ?>" method="POST">
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Username</label>
										<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										<?= form_error('username', '<small class="text-danger">', '</small>') ?>

									</div>
									<div class="mb-4">
										<label for="exampleInputPassword1" class="form-label">Password</label>
										<input type="password" name="password" class="form-control" id="exampleInputPassword1">
										<?= form_error('password', '<small class="text-danger">', '</small>') ?>
									</div>
									<hr>
									<div class="mb-4">
										<label for="exampleInputPassword1" class="form-label">User</label>
										<select name="level" class="form-control">
											<option value="">---Pilih Level User---</option>
											<option value="1">Admin & Rekam Medis</option>
											<option value="2">Dokter</option>
										</select>
										<?= form_error('level', '<small class="text-danger">', '</small>') ?>
									</div>

									<button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('asset/admin/src/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url('asset/admin/src/') ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>