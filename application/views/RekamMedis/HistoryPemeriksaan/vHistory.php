<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi History Diagnosa Dokter</h5>

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
										<h6 class="fw-semibold mb-0">Nama Pasien</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Tanggal Pemeriksaan</h6>
									</th>


								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($history as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><span class="badge bg-success"><?= $value->nama_pasien ?></span></p>


										</td>
										<td class="border-bottom-0">
											<span class="fw-normal"><?= $value->tgl_periksa ?></span>
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