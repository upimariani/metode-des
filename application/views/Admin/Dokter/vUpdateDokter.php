<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Update Data Dokter</h5>
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart('Admin/cDokter/update/' . $dokter->id_dokter); ?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nama Dokter</label>
							<input type="text" name="nama" value="<?= $dokter->nama_dokter ?>" class="form-control" id="input-1" placeholder="Masukkan Nama Dokter">
							<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
							<select name="jk" class="form-control">
								<option value="">---Pilih Jenis Kelamin---</option>
								<option value="Laki - Laki" <?php if ($dokter->jk == 'Laki - Laki') {
																echo 'selected';
															}  ?>>Laki - Laki</option>
								<option value="Perempuan" <?php if ($dokter->jk == 'Perempuan') {
																echo 'selected';
															}  ?>>Perempuan</option>
							</select>
							<?= form_error('jk', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Ahli Dokter</label>
							<input type="text" name="ahli" value="<?= $dokter->ahli_dokter ?>" class="form-control" id="input-2" placeholder="Masukkan Ahli Dokter">
							<?= form_error('ahli', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Alamat</label>
							<input type="text" name="alamat" value="<?= $dokter->alamat ?>" class="form-control" id="input-3" placeholder="Masukkan Alamat">
							<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">No Telepon</label>
							<input type="text" name="no_hp" value="<?= $dokter->no_telp ?>" class="form-control" id="input-4" placeholder="Masukkan No Telepon">
							<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Foto Dokter</label><br>
							<img style="width: 150px;" src="<?= base_url('asset/foto-dokter/' . $dokter->foto) ?>">
							<input type="file" name="gambar" class="form-control" id="input-5" placeholder="Masukkan Password">
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