<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi User</h5>
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
					<a href="<?= base_url('Admin/cUser/create') ?>" class="btn btn-success m-1">Tambah Data User</a>
					<div class="table-responsive">
						<table class="table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Nama User</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Alamat</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Akun</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Level User</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-1"><?= $value->nama_user ?></h6>
											<span class="fw-normal"><?= $value->no_telp ?></span>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->alamat ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->jk ?></p>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><?= $value->username ?> | <?= $value->password ?></p>
										</td>
										<td class="border-bottom-0">
											<div class="d-flex align-items-center gap-2">
												<?php
												if ($value->level_user == '1') {
												?>
													<span class="badge bg-primary rounded-3 fw-semibold">Admin</span>
												<?php
												} else {
												?>
													<span class="badge bg-success rounded-3 fw-semibold">Rekam Medis</span>
												<?php
												}
												?>

											</div>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-4">
												<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-danger m-1">Hapus</a>
												<a href="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" class="btn btn-warning m-1">Edit</a>
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