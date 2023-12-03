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
							<h3 class="font-weight-bold"> History Pemeriksaan Pasien</h3> <small>INV-<?= $detail['pasien']->id_boking ?></small>
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



				</div>
			</div>
		</div>
	</div>