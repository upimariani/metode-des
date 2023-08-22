<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Update Data Penyakitr</h5>
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart('Admin/cPenyakit/update/' . $penyakit->id_penyakit); ?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nama Penyakit</label>
							<input type="text" name="nama" value="<?= $penyakit->nama_penyakit ?>" class="form-control" id="input-2" placeholder="Masukkan Nama Penyakit">
							<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Status Penyakit</label>
							<select name="stat" class="form-control">
								<option value="">---Pilih Status Penyakit---</option>
								<option value="MENULAR" <?php if ($penyakit->stat_penyakit == 'MENULAR') {
															echo 'selected';
														} ?>>MENULAR</option>
								<option value="TIDAK MENULAR" <?php if ($penyakit->stat_penyakit == 'TIDAK MENULAR') {
																	echo 'selected';
																} ?>>TIDAK MENULAR</option>
							</select>
							<?= form_error('stat', '<small class="text-danger">', '</small>') ?>
						</div>

						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Gejala</label>
							<textarea class="form-control" name="gejala"><?= $penyakit->gejala ?></textarea>
							<?= form_error('gejala', '<small class="text-danger">', '</small>') ?>
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