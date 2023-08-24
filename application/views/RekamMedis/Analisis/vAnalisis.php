<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Hasil Analisis</h5>
					<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Tambah Analisis
					</button>
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
						<table class="table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Tahun Prediksi</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">st</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">bt</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Forecast</h6>
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($analisis as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><span class="badge bg-success"><?= $value->thn_prediksi ?></span></p>


										</td>
										<td class="border-bottom-0">
											<span class="fw-normal"><?= $value->st ?></span>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->bt ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->forecast ?></p>
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
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Data Analisis</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('RekamMedis/cAnalisis/hitung') ?>" method="POST">
					<div class="modal-body">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Tahun</label>
							<input class="form-control" type="text" value="<?= $thn_prediksi ?>" name="tahun">
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Tahun Berikutnya</label>
							<input type="text" class="form-control" name="tahun_berikutnya">
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Jumlah Fakta Pengidap Pada Tahun <?= $thn_prediksi ?></label>
							<input class="form-control" type="text" name="jml_pengidap">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>