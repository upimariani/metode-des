<main>

	<section class="hero-section hero-section-full-height">
		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-12 col-12 p-0">
					<div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?= base_url('asset/pasien/') ?>images/slide/volunteer-helping-with-donation-box.jpg" class="carousel-image img-fluid" alt="...">

								<div class="carousel-caption d-flex flex-column justify-content-end">
									<h2>PUSKESMAS<br> DTP TALAGA</h2>

									<p> Jl. Jenderal Ahmad Yani No.21, Talagawetan, <br>Kec. Talaga, Kabupaten Majalengka, Jawa Barat 45466</p>
								</div>
							</div>

							<div class="carousel-item">
								<img src="<?= base_url('asset/pasien/') ?>images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg" class="carousel-image img-fluid" alt="...">

								<div class="carousel-caption d-flex flex-column justify-content-end">
									<h2>PUSKESMAS<br> DTP TALAGA</h2>

									<p> Jl. Jenderal Ahmad Yani No.21, Talagawetan, <br>Kec. Talaga, Kabupaten Majalengka, Jawa Barat 45466</p>
								</div>
							</div>

							<div class="carousel-item">
								<img src="<?= base_url('asset/pasien/') ?>images/slide/medium-shot-people-collecting-donations.jpg" class="carousel-image img-fluid" alt="...">

								<div class="carousel-caption d-flex flex-column justify-content-end">
									<h2>PUSKESMAS<br> DTP TALAGA</h2>

									<p> Jl. Jenderal Ahmad Yani No.21, Talagawetan, <br>Kec. Talaga, Kabupaten Majalengka, Jawa Barat 45466</p>
								</div>
							</div>
						</div>

						<button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>

						<button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>

			</div>
		</div>
	</section>


	<section class="section-padding">
		<div class="container">
			<div class="row">

				<div class="col-lg-10 col-12 text-center mx-auto">
					<h2 class="mb-5">Welcome to Puskesmas DTP Talaga</h2>
				</div>

				<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
					<div class="featured-block d-flex justify-content-center align-items-center">
						<a href="donate.html" class="d-block">
							<img src="<?= base_url('asset/pasien/') ?>images/icons/hands.png" class="featured-block-image img-fluid" alt="">

							<p class="featured-block-text">Melayani <strong>dengan sepenuh hati</strong></p>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
					<div class="featured-block d-flex justify-content-center align-items-center">
						<a href="donate.html" class="d-block">
							<img src="<?= base_url('asset/pasien/') ?>images/icons/heart.png" class="featured-block-image img-fluid" alt="">

							<p class="featured-block-text"><strong>Caring</strong> Healty</p>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
					<div class="featured-block d-flex justify-content-center align-items-center">
						<a href="donate.html" class="d-block">
							<img src="<?= base_url('asset/pasien/') ?>images/icons/receive.png" class="featured-block-image img-fluid" alt="">

							<p class="featured-block-text">Lingkungan<strong>Hidup</strong></p>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
					<div class="featured-block d-flex justify-content-center align-items-center">
						<a href="donate.html" class="d-block">
							<img src="<?= base_url('asset/pasien/') ?>images/icons/scholarship.png" class="featured-block-image img-fluid" alt="">

							<p class="featured-block-text"><strong>Pemberdayaan</strong> Masyarakat</p>
						</a>
					</div>
				</div>

			</div>
		</div>
	</section>





	<section class="cta-section section-padding section-bg">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-5 col-12 ms-auto">
					<h2 class="mb-0">Selamat Datang <br> Puskesmas DTP Talaga.</h2>
				</div>
			</div>
		</div>
	</section>

	<?php
	if ($this->session->userdata('id_pasien') != '') {
	?>
		<section class="contact-section section-padding" id="section_6">
			<div class="container">
				<div class="row">
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
					<div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
						<div class="contact-info-wrap">
							<h2>Informasi Antrian Anda</h2>

							<div class="contact-image-wrap d-flex flex-wrap">

								<div class="d-flex flex-column justify-content-center ms-3">
									<p class="mb-0">Pasien Atas Nama</p>
									<p class="mb-0"><strong><?= $this->session->userdata('nama') ?></strong></p>
								</div>
							</div>

							<?php
							foreach ($boking as $key => $value) {
							?>
								<div class="contact-info">
									<h5 class="mb-3"><?= $value->nama_dokter ?> | <?= $value->ahli_dokter ?></h5>

									<p class="d-flex mb-2">
										<i class="bi-geo-alt me-2"></i>
										<?= $value->hari ?> Jam <?= $value->jam ?> WIB
									</p>

									<p class="d-flex mb-2">
										<i class="bi-telephone me-2"></i>

										No Antrian. <strong> 00<?= $value->no_antrian ?></strong>
									</p>

									<p class="d-flex">
										<i class="bi-info me-2"></i>
										<?php
										if ($value->stat_boking == '0') {
										?>
											<span class="badge bg-danger">Belum Berkunjung</span>
										<?php
										} else {
										?>
											<span class="badge bg-success">Sudah Berkunjung</span>
										<?php
										}
										?>
									</p>
								</div>
								<hr>
							<?php
							}
							?>

						</div>
					</div>

					<div class="col-lg-5 col-12 mx-auto">
						<form class="custom-form contact-form" action="<?= base_url('Pasien/cHome/boking') ?>" method="post" role="form">
							<h2>Boking Jadwal Dokter</h2>

							<p class="mb-4">Silahkan mengisi data jadwal dokter untuk mendapatkan no antrian
							</p>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-12">
									<select class="form-control" id="dokter" required>
										<option value="">---Pilih Dokter Kunjungan---</option>
										<?php
										foreach ($dokter as $key => $value) {
										?>
											<option value="<?= $value->id_dokter ?>"><?= $value->nama_dokter ?> | <?= $value->ahli_dokter ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<select name="jadwal" id="jadwal" class="form-control" required>

									</select>
								</div>
								<div class="col-lg-12 col-md-6 col-12">
									<input type="date" name="tgl_periksa" class="form-control" placeholder="Jack" required>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<textarea name="keluhan" rows="5" class="form-control" id="message" placeholder="Apa Keluhan Anda?" required></textarea>

								</div>
							</div>


							<button type="submit" class="form-control">Boking</button>
						</form>
					</div>

				</div>
			</div>
		</section>
	<?php
	}

	?>

</main>