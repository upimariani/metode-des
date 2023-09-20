<main>

	<section class="donate-section">
		<div class="section-overlay"></div>
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-12 mx-auto">
					<form class="custom-form donate-form" action="<?= base_url('Pasien/cLogin/register') ?>" method="post" role="form">
						<h3 class="mb-4">Registrasi Pasien</h3>

						<div class="row">

							<div class="col-lg-6 col-12 mt-2">
								<label>Nama Pasien</label>
								<input type="text" name="nama" class="form-control" placeholder="masukkan nama">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>No Telepon</label>
								<input type="text" name="no_hp" class="form-control" placeholder="masukkan no hp">
								<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Alamat</label>
								<select name="alamat" class="form-control">
									<option value="">---Pilih Alamat Desa---</option>
									<option value="Argasari">Argasari</option>
									<option value="Campaga">Campaga</option>
									<option value="Cibeureum">Cibeureum</option>
									<option value="Cicanir">Cicanir</option>
									<option value="Cikeusal">Cikeusal</option>
									<option value="Ganeas">Ganeas</option>
									<option value="Gunung Manik">Gunung Manik</option>
									<option value="Jatipamor">Jatipamor</option>
									<option value="Ketrahayu">Ketrahayu</option>
									<option value="Lampuyang">Lampuyang</option>
									<option value="Margamukti">Margamukti</option>
									<option value="Mekarhurip">Mekarhurip</option>
									<option value="Mekarraharja">Mekarraharja</option>
									<option value="Salado">Salado</option>
									<option value="Sukaperna">Sukaperna</option>
									<option value="Talagakulon">Talagakulon</option>
									<option value="Talagawetan">Talagawetan</option>
								</select>
								<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Tempat, Tanggal Lahir</label>
								<input type="text" name="ttl" class="form-control" placeholder="masukkan ttl">
								<?= form_error('ttl', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Berat Badan</label>
								<input type="number" name="bb" class="form-control" placeholder="masukkan berat badan">
								<?= form_error('bb', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Tinggi Badan</label>
								<input type="number" name="tinggi" class="form-control" placeholder="masukkan tinggi badan">
								<?= form_error('tinggi', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-12 col-12 mt-2">
								<label>Jenis Kelamin</label>
								<select name="jk" class="form-control">
									<option value="">---Pilih Jenis Kelamin---</option>
									<option value="Laki - Laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<?= form_error('jk', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="masukkan username">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-6 col-12 mt-2">
								<label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="masukkan password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="col-lg-12 col-12 mt-2">
								<p class="mt-3">Apakah anda sudah memiliki akun?<a href="<?= base_url('Pasien/cLogin') ?>"> Silahkan Login!</a></p>
								<button type="submit" class="form-control mt-4">Register</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>
</main>