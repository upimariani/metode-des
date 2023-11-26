<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Laporan Peramalan Per Desa</h5>
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('KepalaPuskesmas/cLaporanJk/cetak') ?>" method="POST">
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
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama Desa</label>
								<select class="form-control" name="desa" required>
									<option value="">---Pilih Nama Desa---</option>
									<option value="Argasari">Argasari</option>
									<option value="Campaga">Campaga</option>
									<option value="Cibeureum">Cibeureum</option>
									<option value="Cicanir">Cicanir</option>
									<option value="Cikeusal">Cikeusal</option>
									<option value="Ganeas">Ganeas</option>
									<option value="Gunungmanik">Gunungmanik</option>
									<option value="Jatipamor">Jatipamor</option>
									<option value="Ketrahayu">Ketrahayu</option>
									<option value="Lampuyang">Lampuyang</option>
									<option value="Margamukti">Margamukti</option>
									<option value="Mekarhurip">Mekarhurip</option>
									<option value="Mekarrahaja">Mekarrahaja</option>
									<option value="Salado">Salado</option>
									<option value="Sukaperna">Sukaperna</option>
									<option value="Talagakulon">Talagakulon</option>
									<option value="Talagawetan">Talagawetan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
								<select class="form-control" name="jk" required>
									<option value="">---Pilih Jenis Kelamin---</option>
									<option value="P">Perempuan</option>
									<option value="L">Laki - Laki</option>
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