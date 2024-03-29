<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Tambah Data User</h5>
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Admin/cUser/create') ?>" method="POST">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama User</label>
								<input type="text" name="nama" class="form-control" id="input-1" placeholder="Masukkan Nama User">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
								<select name="jk" class="form-control">
									<option value="">---Pilih Jenis Kelamin---</option>
									<option value="Laki - Laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<?= form_error('level', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Alamat</label>
								<input type="text" name="alamat" class="form-control" id="input-2" placeholder="Masukkan Alamat">
								<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">No Telepon</label>
								<input type="text" name="no_hp" class="form-control" id="input-3" placeholder="Masukkan No Telepon">
								<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Username</label>
								<input type="text" name="username" class="form-control" id="input-4" placeholder="Masukkan Username">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Password</label>
								<input type="text" name="password" class="form-control" id="input-5" placeholder="Masukkan Password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Level User</label>
								<select name="level" class="form-control">
									<option value="">---Pilih Level User---</option>
									<option value="1">Bag. Pendaftaran</option>
									<option value="6">Apotek</option>
									<option value="7">Kasir</option>
									<option value="8">Kepala Puskesmas</option>
									<option value="2">Rekam Medis ISPA</option>
									<option value="3">Rekam Medis Pneumonia</option>
									<option value="4">Rekam Medis TBC</option>
									<option value="5">Rekam Medis Diare</option>
								</select>
								<?= form_error('level', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Rekam Medis Penyakit</label>
								<select name="rekam" class="form-control">
									<option value="">---Pilih Analisis Penyakit---</option>
									<option value="0">Bukan Rekam Medis</option>
									<?php
									foreach ($penyakit as $key => $value) {
									?>
										<option value="<?= $value->id_penyakit ?>"><?= $value->nama_penyakit ?></option>
									<?php
									}
									?>

								</select>
								<?= form_error('rekam', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-success px-5"><i class="icon-lock"></i> Save</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>