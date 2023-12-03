<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Tambah Data Penyakit</h5>
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart('Admin/cPenyakit/create'); ?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Nama Penyakit</label>
							<input type="text" name="nama" class="form-control" id="input-2" placeholder="Masukkan Nama Penyakit">
							<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Status Penyakit</label>
							<select name="stat" class="form-control">
								<option value="">---Pilih Status Penyakit---</option>
								<option value="MENULAR">MENULAR</option>
								<option value="TIDAK MENULAR">TIDAK MENULAR</option>
							</select>
							<?= form_error('stat', '<small class="text-danger">', '</small>') ?>
						</div>

						<!-- <div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Gejala</label>
							<textarea class="form-control" name="gejala"></textarea>
							<?= form_error('gejala', '<small class="text-danger">', '</small>') ?>
						</div> -->

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