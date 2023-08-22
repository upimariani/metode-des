<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Update Data Jadwal Dokter</h5>
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart('Admin/cJadwalDokter/update/' . $jdwal_dokter->id_jadwal); ?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nama Dokter</label>
							<select name="nama" class="form-control">
								<option value="">---Pilih Nama Dokter---</option>
								<?php
								foreach ($dokter as $key => $value) {
								?>
									<option <?php if ($value->id_dokter == $jdwal_dokter->id_dokter) {
												echo 'selected';
											} ?> value="<?= $value->id_dokter ?>"><?= $value->nama_dokter ?> | <?= $value->ahli_dokter ?></option>
								<?php
								}
								?>

							</select>
							<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nama Hari</label>
							<input type="text" name="hari" value="<?= $jdwal_dokter->hari ?>" class="form-control" id="input-2" placeholder="Masukkan Hari Dokter">
							<?= form_error('hari', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Jam</label>
							<input type="text" name="jam" value="<?= $jdwal_dokter->jam ?>" class="form-control" id="input-3" placeholder="Masukkan Jam">
							<?= form_error('jam', '<small class="text-danger">', '</small>') ?>
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