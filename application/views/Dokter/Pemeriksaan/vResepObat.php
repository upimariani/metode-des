<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Resep Dokter</h5>
				<div class="card mb-3">
					<?php
					$qty = 0;
					foreach ($this->cart->contents() as $key => $value) {
						$qty += $value['qty'];
					}
					if ($qty != 0) {
					?>
						<div class="card-body">
							<table class="table">
								<thead class="table-warning">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nama Obat</th>
										<th scope="col">Harga Obat</th>
										<th scope="col">Jumlah / satuan</th>
										<th scope="col">Aturan</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<tr>
											<th scope="row"><?= $no++ ?></th>
											<td><?= $value['name'] ?></td>
											<td>Rp. <?= number_format($value['price'])  ?></td>
											<td><?= $value['qty'] ?></td>
											<td><?= $value['aturan'] ?></td>
											<td><a href="<?= base_url('Dokter/cPemeriksaan/delete/' . $value['rowid'] . '/' . $id_boking) ?>" class="btn btn-danger">X</a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td><a href="<?= base_url('Dokter/cPemeriksaan/selesai/' . $id_boking) ?>" class="btn btn-success">Selesai</a></td>
									</tr>
								</tfoot>
							</table>
						</div>
					<?php
					} ?>

				</div>
				<div class="card mb-0">
					<div class="card-header">
						<legend>Resep Obat dari Dokter</legend>
						<hr>
					</div>
					<div class="card-body">
						<form action="<?= base_url('Dokter/cPemeriksaan/add/' . $id_boking) ?>" method="POST">

							<div class="mb-3">
								<label class="form-label">Obat</label>
								<select id="obat" name="obat" class="form-select" required>
									<option value="">Pilih Obat</option>
									<?php
									foreach ($obat as $key => $value) {
									?>
										<option data-nama="<?= $value->nama_obat ?>" data-harga="<?= $value->harga_obat ?>" value="<?= $value->id_obat ?>"><?= $value->nama_obat ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<hr>
							<div class="mb-3">
								<label class="form-label">Nama Obat</label>
								<input type="text" name="nama" class="nama form-control" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Harga Obat</label>
								<input type="text" name="harga" class="harga form-control" readonly>
							</div>
							<hr>
							<div class="mb-3">
								<label class="form-label">Jumlah / satuan</label>
								<input type="number" name="jumlah" class="form-control" placeholder="ex : 5 //tablet" required>
							</div>
							<div class="mb-3">
								<label class="form-label">Aturan</label>
								<textarea class="form-control" name="aturan" placeholder="ex : 3 x 1 (sebelum makan)" required></textarea>
							</div>
							<button type="submit" class="btn btn-warning">Tambah Obat</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>