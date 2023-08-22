<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Penyakit</h5>
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
					<a href="<?= base_url('Admin/cPenyakit/create') ?>" class="btn btn-success m-1">Tambah Data Penyakit</a>
					<div class="table-responsive">
						<table class="table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Nama Penyakit</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Status Penyakit</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Gejala</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($penyakit as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<span class="fw-normal"><?= $value->nama_penyakit ?></span>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->stat_penyakit ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->gejala ?></p>
										</td>

										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-4">
												<a href="<?= base_url('Admin/cPenyakit/delete/' . $value->id_penyakit) ?>" class="btn btn-danger m-1">Hapus</a>
												<a href="<?= base_url('Admin/cPenyakit/update/' . $value->id_penyakit) ?>" class="btn btn-warning m-1">Edit</a>
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