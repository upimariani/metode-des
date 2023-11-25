<div class="py-6 px-6 text-center">
	<p class="mb-0 fs-4">KASIR | PUSKESMAS DTP TALAGA</p>
</div>
</div>
</div>
</div>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/js/app.min.js"></script>
<script src="<?= base_url('asset/admin/src/') ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<script src="<?= base_url('asset/datatables') ?>/datatables.min.js"></script>

<script>
	$(document).ready(function() {
		$('.myTable').DataTable();
	});
</script>
<script>
	<?php
	$data_analisis = $this->db->query("SELECT * FROM `analisis_des`")->result();
	foreach ($data_analisis as $key => $value) {
		$forecast[] = $value->forecast;
		$thn[] = $value->thn_prediksi;
	}

	?>
	var ctx = document.getElementById('analisis');
	var grafik = new Chart(ctx, {
		type: 'line',
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
</body>

</html>