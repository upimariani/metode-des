<div class="container-fluid">

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Hasil Analisis Per Jenis Kelamin <?= $jk ?></h5>
					<button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
					<div class="col-lg-8 d-flex align-items-strech">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
									<div class="mb-3 mb-sm-0">
										<h5 class="card-title fw-semibold">Grafik Peramalan Penyakit Per Jenis Kelamin</h5>
									</div>

								</div>
								<canvas id="pengidap_jk" height="150"></canvas>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="myTable" class="table text-nowrap mb-0 align-middle">
									<thead class="text-dark fs-4">
										<tr>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">No</h6>
											</th>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">Tahun Prediksi</h6>
											</th>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">Jumlah Pengidap</h6>
											</th>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">Nilai Pemulusan (st)</h6>
											</th>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">Nilai Trend (bt)</h6>
											</th>
											<th class="border-bottom-0">
												<h6 class="fw-semibold mb-0">Hasil Peramalan <br>(Forecast)</h6>
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
													<p class="mb-0 fw-normal"><span class="badge bg-success"><?= $value->thn_periode ?></span></p>
												</td>
												<td class="border-bottom-0">
													<p class="mb-0 fw-normal"><span class="badge bg-danger"><?= $value->jml_pengidap ?></span></p>
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
				<form action="<?= base_url('RekamMedis/cAnalisisPerJk/hitung') ?>" method="POST">
					<div class="modal-body">
						<div class="mb-3">
							<input type="hidden" name="jk" value="<?= $jk ?>">
							<input type="hidden" name="tahun" class="tahun">
							<label for="exampleInputEmail1" class="form-label">Tahun</label>
							<select id="pengidap" name="penyakit" class="form-control">
								<option>---Pilih Tahun Prediksi---</option>
								<?php
								$urutan = '1';
								foreach ($periode as $key => $value) {
								?>

									<?php
									//cek analisis
									$data = $this->db->query("SELECT * FROM `analisis_jk` WHERE thn_periode='" . $value->tahun . "' AND id_penyakit ='" . $value->id_penyakit . "' AND nama_desa='" . $value->alamat . "' AND jk='" . $value->jk . "'")->row();
									if (!$data) {
										if ($urutan++ == '1') {
									?>
											<option data-alamat="<?= $value->alamat ?>" data-tahun="<?= $value->tahun ?>" data-pengidap="<?= $value->jml ?>" value="<?= $value->id_penyakit ?>"><?= $value->tahun ?></option>

										<?php
										} else {
										?>
											<option data-tahun="<?= $value->tahun ?>" data-pengidap="<?= $value->jml ?>" value="<?= $value->id_penyakit ?>" disabled><?= $value->tahun ?></option>
								<?php
										}
									}
								}
								?>

							</select>
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Alamat</label>
							<input class="alamat form-control" type="text" name="alamat">
						</div>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Jumlah Fakta Pengidap Pada Tahun <span class="tahun"></span></label>
							<input class="pengidap form-control" type="text" name="jml_pengidap">
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

	
