<div class="container-fluid">
	<!--  Row 1 -->
	<div class="row">
		<div class="col-lg-9 d-flex align-items-stretch">
			<div class="card w-100">
				<div class="card-body p-4">
					<h5 class="card-title fw-semibold mb-4">Informasi Alamat Pasien</h5>
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
						<table id="myTable" class="table text-nowrap mb-0 align-middle">
							<thead class="text-dark fs-4">
								<tr>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">No</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">Alamat</h6>
									</th>
									<th class="border-bottom-0">
										<h6 class="fw-semibold mb-0">View</h6>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($alamat as $key => $value) {
								?>
									<tr>
										<td class="border-bottom-0">
											<h6 class="fw-semibold mb-0"><?= $no++ ?></h6>
										</td>

										<td class="border-bottom-0">
											<span class="fw-normal"><?= $value->alamat ?></span>
										</td>
										<td class="border-bottom-0">
											<div class="btn-group" role="group">
												<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
													Range Umur
												</button>
												<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
													<li><a class="dropdown-item" href="<?= base_url('RekamMedis/cAnalisisPerUmur/analisis/' . $value->alamat . '/21/26')  ?>">26 - 21 tahun</a></li>
													<li><a class="dropdown-item" href="<?= base_url('RekamMedis/cAnalisisPerUmur/analisis/' . $value->alamat . '/15/20')  ?>">20 - 15 tahun</a></li>
													<li><a class="dropdown-item" href="<?= base_url('RekamMedis/cAnalisisPerUmur/analisis/' . $value->alamat . '/9/14')  ?>">14 - 9 tahun</a></li>
													<li><a class="dropdown-item" href="<?= base_url('RekamMedis/cAnalisisPerUmur/analisis/' . $value->alamat . '/3/8')  ?>">8 - 3 tahun</a></li>
												</ul>
											</div>
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
