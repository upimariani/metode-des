<main>

	<section class="donate-section">
		<div class="section-overlay"></div>
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-12 mx-auto">
					<form class="custom-form donate-form" action="<?= base_url('Pasien/cLogin') ?>" method="post" role="form">
						<h3 class="mb-4">Login Pasien</h3>
						<?php
						if ($this->session->userdata('success') != '') {
						?>
							<div class="alert alert-success alert-dismissible" role="alert">

								<div class="alert-message">
									<span><strong>Success!</strong> <?= $this->session->userdata('success') ?></span>
								</div>
							</div>
						<?php
						}
						?>
						<?php
						if ($this->session->userdata('error') != '') {
						?>
							<div class="alert alert-danger alert-dismissible" role="alert">

								<div class="alert-message">
									<span><strong>Gagal!</strong> <?= $this->session->userdata('error') ?></span>
								</div>
							</div>
						<?php
						}
						?>
						<div class="row">

							<div class="col-lg-6 col-12 mt-2">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="masukkan username">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="masukkan password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-12 col-12 mt-2">
								<p class="mt-3">Apakah anda belum memiliki akun?<a href="<?= base_url('Pasien/cLogin/register') ?>"> Silahkan Registrasi!</a></p>
								<button type="submit" class="form-control mt-4">Sign In</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>
</main>