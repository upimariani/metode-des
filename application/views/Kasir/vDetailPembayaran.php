<div class="container-fluid">
	<!--  Row 1 -->

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
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="d-flex flex-row p-2"> <img src="<?= base_url('asset/logo.jpg') ?>" width="150px">
						<div class="d-flex flex-column">
							<h3 class="font-weight-bold"> Invoice</h3> <small>INV-<?= $detail['pasien']->id_boking ?></small>
						</div>
					</div>
					<hr>
					<div class="table-responsive p-2">
						<table class="table table-borderless">
							<tbody>
								<tr class="add">
									<td>Pasien</td>
									<td>Diagnosa Dokter</td>
								</tr>
								<tr class="content">
									<td class="font-weight-bold"><strong><?= $detail['pasien']->nama_pasien ?></strong> <br><?= $detail['pasien']->alamat ?><br><?= $detail['pasien']->tempat_lahir ?>, <?= $detail['pasien']->tanggal_lahir ?></td>
									<td class="font-weight-bold"><?= $detail['pasien']->nama_penyakit ?> <br> <?= $detail['pasien']->detail_penyakit ?> <br> <?= $detail['pasien']->saran ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<div class="products p-2">
						<table class="table table-borderless">
							<tbody>
								<tr class="add">
									<td>Nama Obat</td>
									<td>Jumlah Obat / satuan</td>
									<td>Harga</td>
									<td class="text-center">Subotal</td>
								</tr>
								<?php
								foreach ($detail['obat'] as $key => $value) {
								?>
									<tr class="content">
										<td><?= $value->nama_obat ?></td>
										<td><?= $value->jml_obat ?> X</td>
										<td>Rp. <?= number_format($value->harga_obat) ?></td>
										<td class="text-center"><strong>Rp. <?= number_format($value->harga_obat * $value->jml_obat) ?></strong></td>
									</tr>
								<?php
								}
								?>

							</tbody>
						</table>
					</div>
					<hr>
					<div class="products p-2">
						<table class="table table-borderless">
							<tbody>
								<tr class="add">
									<td class="text-center">Total</td>
								</tr>
								<tr class="content">
									<td class="text-center">
										<h4><strong>Rp. <?= number_format($detail['pasien']->total_pembayaran) ?></strong></h4>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<?php
					if ($detail['pasien']->pembayaran == '0') {
					?>
						<div class="address p-2">
							<table class="table table-borderless">
								<tbody>
									<tr class="add">
										<td><strong>Metode Pembayaran</strong></td>
									</tr>
									<form action="<?= base_url('Kasir/cPembayaran/metode_pembayaran/' . $detail['pasien']->id_boking) ?>" method="POST">
										<tr class="content">
											<td>
												<select class="form-control" name="pembayaran" required>
													<option value="">Metode Pembayaran</option>
													<option value="1">Cash</option>
													<option value="2">Transfer</option>
												</select>
											</td>
											<td><button type="submit" class="btn btn-success">OK!</button></td>
										</tr>
									</form>
								</tbody>
							</table>
						</div>
					<?php
					}
					?>
					<?php
					if ($detail['pasien']->pembayaran == '2') {
					?>
						<div class="address p-2">
							<table class="table table-borderless">
								<tbody>
									<tr class="add">
										<td><strong>Pembayaran</strong></td>
									</tr>
									<form action="<?= base_url('Kasir/cPembayaran/metode_pembayaran/' . $detail['pasien']->id_boking) ?>" method="POST">
										<tr class="content">

											<td><span class="badge bg-danger">Menunggu Upload Bukti Pembayaran Pasien!</span></td>
										</tr>
								</tbody>
							</table>
						</div>
					<?php
					} else if ($detail['pasien']->pembayaran != '2' && $detail['pasien']->pembayaran != '0' && $detail['pasien']->pembayaran != '1') {
					?>
						<div class="address p-2">
							<table class="table table-borderless">
								<tbody>
									<tr class="add">
										<td><strong>Pembayaran Selesai</strong></td>
									</tr>
									<tr class="content">
										<td><span class="badge bg-success">Pasien Berhasil Upload Bukti Pembayaran Pasien!</span><br>
											<img style="width: 250px;" src="<?= base_url('asset/pembayaran/' . $detail['pasien']->pembayaran) ?>">
										</td>
										<?php
										if ($detail['pasien']->stat_boking == '2') {
										?>
									<tr>
										<td>
											<a class="btn btn-warning" href="<?= base_url('Kasir/cPembayaran/konfirmasi_pembayaran/' . $detail['pasien']->id_boking) ?>">Konfirmasi Pembayaran</a>
										</td>
									</tr>
								<?php
										}
								?>

								</tbody>
							</table>
						</div>
					<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>