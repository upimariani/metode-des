<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Dokter</h5>
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
					<a href="<?= base_url('Admin/cDokter/create') ?>" class="btn btn-success m-1">Tambah Data Dokter</a>
					<div class="table-responsive">
						<table class="myTable table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Nama Dokter</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Alamat</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No Telepon</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Akun</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($dokter as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-1"><img style="width: 100px;" src="<?= base_url('asset/foto-dokter/' . $value->foto) ?>"></h6>
											<span class="fw-normal"><?= $value->nama_dokter ?></span><br>
											<span class="fw-normal"><?= $value->ahli_dokter ?></span>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->jk ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->alamat ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->no_telp ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><span class="badge bg-success"><?= $value->username ?></span> | <span class="badge bg-danger"><?= $value->password ?></span></p>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-2">
												<a href="<?= base_url('Admin/cDokter/delete/' . $value->id_dokter) ?>" class="btn btn-danger m-1">Hapus</a><br>
												<a href="<?= base_url('Admin/cDokter/update/' . $value->id_dokter) ?>" class="btn btn-warning m-1">Edit</a>
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