<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Laporan Peramalan Per Penyakit</h5>
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('KepalaPuskesmas/cLaporanPenyakit/cetak') ?>" method="POST">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama Penyakit</label>
								<select class="form-control" name="penyakit" required>
									<option value="">---Pilih Nama Penyakit---</option>
									<option value="1">ISPA</option>
									<option value="2">Pneumonia</option>
									<option value="3">TBC</option>
									<option value="4">Diare</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Cetak Laporan</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>