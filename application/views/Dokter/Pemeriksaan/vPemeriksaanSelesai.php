<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Diagnosa Dokter</h5>
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
						<table class="myTable text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No Antrian</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Dokter</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Nama Pasien</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Keluhan</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Tindakan</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pemeriksaan as $key => $value) {
								?>
									<tr>
										<td>
											<h6><?= $no++ ?></h6>
										</td>
										<td>
											<p class=" mb-0 fw-normal"><span class="badge bg-success">00<?= $value->no_antrian ?></span></p>
											<p class="mb-0 fw-normal"><?= $value->tgl_periksa ?></p>
											<?php
											if ($value->stat_boking == '0') {
											?>
												<span class="badge bg-danger">Belum Berkunjung</span>
											<?php
											} else if ($value->stat_boking == '1') {
											?>
												<span class="badge bg-warning">Sedang Pemeriksaan Dokter</span>
											<?php
											} else {
											?>
												<span class="badge bg-success">Selesai</span>
											<?php
											}
											?>
										</td>
										<td class="border-bottom-0">
											<span class="fw-normal"><?= $value->nama_dokter ?></span><br>
											<span class="fw-normal"><?= $value->ahli_dokter ?></span><br>
											<span class="fw-normal"><?= $value->hari ?> |<br> <?= $value->jam ?> WIB</span>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->nama_pasien ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->keluhan_pasien ?></p>
											<p><strong>Hasil Pemeriksaan: </strong> <?= $value->detail_penyakit ?></p>
											<p><strong>Penyakit: </strong> <?= $value->nama_penyakit ?></p>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-2">

												<p><strong>Saran: </strong> <?= $value->saran ?></p>
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