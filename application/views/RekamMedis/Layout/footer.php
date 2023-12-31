<div class="py-6 px-6 text-center">
	<p class="mb-0 fs-4">ADMIN | PUSKESMAS DTP TALAGA</p>
</div>
</div>
</div>
</div>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/js/app.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url('asset/datatables') ?>/datatables.min.js"></script>
<script>
	console.log = function() {}
	$("#pengidap").on('change', function() {

		$(".pengidap").html($(this).find(':selected').attr('data-pengidap'));
		$(".pengidap").val($(this).find(':selected').attr('data-pengidap'));

		$(".tahun").html($(this).find(':selected').attr('data-tahun'));
		$(".tahun").val($(this).find(':selected').attr('data-tahun'));

		$(".alamat").html($(this).find(':selected').attr('data-alamat'));
		$(".alamat").val($(this).find(':selected').attr('data-alamat'));

	});
</script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<script>
	<?php
	$id_penyakit = $this->session->userdata('id_penyakit');
	$data_analisis = $this->db->query("SELECT * FROM `analisis_des` WHERE id_penyakit= $id_penyakit")->result();
	foreach ($data_analisis as $key => $value) {
		$forecast[] = $value->forecast;
		$thn[] = $value->thn_prediksi;
	}

	?>
	var ctx = document.getElementById('analisis');
	var grafik = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($thn) ?>,
			datasets: [{
				label: 'Grafik Forecast Penyakit',
				data: <?= json_encode($forecast) ?>,
				backgroundColor: [
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				borderColor: [
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			animations: {
				tension: {
					duration: 1000,
					easing: 'linear',
					from: 1,
					to: 0,
					loop: true
				}
			},
			scales: {
				y: { // defining min and max so hiding the dataset does not change scale range
					min: 0,
					max: 100
				},
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	<?php
	$analisis = $this->db->query("SELECT * FROM `analisis_perdesa` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "'")->result();
	foreach ($analisis as $key => $value) {
		$tahun[] = $value->thn_periode;
		$jml[] = $value->jml_pengidap;
	}

	?>
	var ctx = document.getElementById('jml_pengidap');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tahun) ?>,
			datasets: [{
				label: 'Grafik Jumlah Pengidap ',
				data: <?= json_encode($jml) ?>,
				backgroundColor: [
					'rgba(201, 76, 76, 0.8)',

				],
				borderColor: [
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			animations: {
				tension: {
					duration: 1000,
					easing: 'linear',
					from: 1,
					to: 0,
					loop: true
				}
			},
			scales: {
				y: { // defining min and max so hiding the dataset does not change scale range
					min: 0,
					max: 100
				},
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	<?php
	$analisis = $this->db->query("SELECT * FROM `analisis_jk` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' AND jk='" . $jk . "'")->result();
	foreach ($analisis as $key => $value) {
		$tahun_jk[] = $value->thn_periode;
		$jml_jk[] = $value->jml_pengidap;
	}

	?>
	var ctx = document.getElementById('pengidap_jk');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tahun_jk) ?>,
			datasets: [{
				label: 'Grafik Jumlah Pengidap Per Jenis Kelamin',
				data: <?= json_encode($jml_jk) ?>,
				backgroundColor: [
					'rgba(0, 140, 162, 1)',

				],
				borderColor: [
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			animations: {
				tension: {
					duration: 1000,
					easing: 'linear',
					from: 1,
					to: 0,
					loop: true
				}
			},
			scales: {
				y: { // defining min and max so hiding the dataset does not change scale range
					min: 0,
					max: 100
				},
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	<?php
	$analisis_umur = $this->db->query("SELECT * FROM `analisis_umur` WHERE id_penyakit='" . $id_penyakit . "' AND nama_desa='" . $alamat . "' AND umur_bawah='" . $umur_bawah . "' AND umur_atas='" . $umur_atas . "'")->result();
	foreach ($analisis_umur as $key => $value) {
		$tahun_umur[] = $value->thn_periode;
		$jml_umur[] = $value->jml_pengidap;
	}

	?>
	var ctx = document.getElementById('pengidap_umur');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tahun_umur) ?>,
			datasets: [{
				label: 'Grafik Jumlah Pengidap Per Umur',
				data: <?= json_encode($jml_umur) ?>,
				backgroundColor: [
					'rgba(201, 77, 201, 1)',

				],
				borderColor: [
					'rgba(201, 76, 76, 0.3)',

				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			animations: {
				tension: {
					duration: 1000,
					easing: 'linear',
					from: 1,
					to: 0,
					loop: true
				}
			},
			scales: {
				y: { // defining min and max so hiding the dataset does not change scale range
					min: 0,
					max: 100
				},
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
</body>

</html>
