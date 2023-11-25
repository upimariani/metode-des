<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Obat Pasien</h5>
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
					<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success m-1">Tambah Data Obat</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Masukkan Data Obat</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form action="<?= base_url('Apotek/cObat/create') ?>" method="POST">
									<div class="modal-body">
										<div class="mb-3">
											<label for="exampleInputEmail1" class="form-label">Nama Obat</label>
											<input type="text" name="nama" class="form-control" id="input-1" placeholder="Masukkan Nama Obat" required>
										</div>
										<div class="mb-3">
											<label for="exampleInputEmail1" class="form-label">Harga Obat / satuan</label>
											<input type="text" name="harga" class="form-control" id="input-2" placeholder="Masukkan Harga" required>
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
					<div class="table-responsive">
						<table class="myTable table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Nama Obat</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Harga Obat</h6>
									</th>

									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($obat as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-1"><?= $value->nama_obat ?></h6>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal">Rp. <?= number_format($value->harga_obat)  ?></p>
										</td>



										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-4">
												<a href="<?= base_url('Apotek/cObat/delete/' . $value->id_obat) ?>" class="btn btn-danger m-1">Hapus</a>
												<button data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_obat ?>" class="btn btn-warning m-1">Update</button>
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

	<?php
	foreach ($obat as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_obat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data Obat</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('Apotek/cObat/update/' . $value->id_obat) ?>" method="POST">
						<div class="modal-body">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama Obat</label>
								<input type="text" name="nama" class="form-control" value="<?= $value->nama_obat ?>" id="input-1" placeholder="Masukkan Nama Obat" required>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Harga Obat / satuan</label>
								<input type="text" name="harga" class="form-control" value="<?= $value->harga_obat ?>" id="input-2" placeholder="Masukkan Harga" required>
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
	<?php
	}
	?>