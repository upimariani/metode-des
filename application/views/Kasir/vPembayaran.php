<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Pembayaran Pasien</h5>
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

					<div class="table-responsive">
						<table class="myTable table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Atas Nama</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Tanggal Periksa</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Total Pembayaran</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pembayaran as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-1"><?= $value->nama_pasien ?></h6>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-1"><?= $value->tgl_periksa ?></h6>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal">Rp. <?= number_format($value->total_pembayaran)  ?></p>
										</td>



										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-4">
												<a href="<?= base_url('Kasir/cPembayaran/detail_pembayaran/' . $value->id_boking) ?>" class="btn btn-danger m-1">Detail History</a>
											</h6>
										</td>
									</tr>
								<?php
								}
								?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>