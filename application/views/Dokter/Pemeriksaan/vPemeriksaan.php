<div class="container-fluid">
	<!--  Row 1 -->

	<div class="row">

		<div class="col-lg-12 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Boking Pasien</h5>
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
										<h6 class="fw-semibold mb-0">Action</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($pemeriksaan as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>
										<td class="border-bottom-0">
											<p class="mb-0 fw-normal"><span class="badge bg-success">00<?= $value->no_antrian ?></span></p>
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
										</td>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0 fs-2">

												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
													Pemeriksaan
												</button>
												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Diagnosa Dokter, Pasien <strong><?= $value->nama_pasien ?></strong></h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<form action="<?= base_url('Dokter/cPemeriksaan/diagnosa/' . $value->id_boking) ?>" method="POST">
																<div class="modal-body">
																	<div class="mb-3">
																		<label for="exampleInputEmail1" class="form-label">Nama Penyakit</label>
																		<select name="penyakit" class="form-control" required>
																			<option value="">---Pilih Jenis Penyakit---</option>
																			<?php
																			foreach ($penyakit as $key => $value) {
																			?>
																				<option value="<?= $value->id_penyakit ?>"><?= $value->nama_penyakit ?></option>
																			<?php
																			}
																			?>
																		</select>
																	</div>
																	<div class="mb-3">
																		<label for="exampleInputEmail1" class="form-label">Detail Penyakit</label>
																		<textarea name="detail_penyakit" size="5" class="form-control" placeholder="Masukkan Detail Penyakit..." required></textarea>
																	</div>
																	<div class="mb-3">
																		<label for="exampleInputEmail1" class="form-label">Saran</label>
																		<textarea name="saran" size="5" class="form-control" placeholder="Masukkan Saran u/ Pasien..." required></textarea>
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