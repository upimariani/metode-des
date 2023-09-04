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
					<div class="accordion accordion-flush" id="accordionFlushExample">
						<?php
						foreach ($dokter as $key => $item) {
							$notifikasi = $this->db->query("SELECT COUNT(id_boking) as notif FROM `boking_jdwl` JOIN jdwl_dokter ON jdwl_dokter.id_jadwal=boking_jdwl.id_jadwal JOIN dokter ON jdwl_dokter.id_dokter=dokter.id_dokter WHERE stat_boking='0' AND dokter.id_dokter='" . $item->id_dokter . "'")->row();
						?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $item->id_dokter ?>" aria-expanded="false" aria-controls="flush-collapseOne">
										<?= $item->nama_dokter ?>
										<?php if ($notifikasi->notif != '0') {
										?>
											<span class="badge bg-warning"><?= $notifikasi->notif ?></span>
										<?php
										} ?>
									</button>
								</h2>
								<div id="<?= $item->id_dokter ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body">
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
													foreach ($boking as $key => $value) {
														if ($value->id_dokter == $item->id_dokter) {

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
																		<?php
																		if ($value->stat_boking == '0') {
																		?>
																			<a href="<?= base_url('Admin/cBokingPasien/pemeriksaan_dokter/' . $value->id_boking) ?>" class="btn btn-warning m-2">Pemeriksaan</a>
																		<?php
																		}
																		?>

																	</h6>
																</td>
															</tr>
													<?php
														}
													}
													?>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>


					</div>

				</div>
			</div>
		</div>
	</div>