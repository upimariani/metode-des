<footer class="site-footer">


	<div class="site-footer-bottom">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-7 col-12">
					<p class="copyright-text mb-0">PUSKESMAS DTP TALAGA
					</p>
				</div>
			</div>

		</div>
	</div>
	</div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="<?= base_url('asset/pasien/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('asset/pasien/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/pasien/') ?>js/jquery.sticky.js"></script>
<script src="<?= base_url('asset/pasien/') ?>js/click-scroll.js"></script>
<script src="<?= base_url('asset/pasien/') ?>js/counter.js"></script>
<script src="<?= base_url('asset/pasien/') ?>js/custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#dokter').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Pasien/cHome/jadwal'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_jadwal + '>' + data[i].hari + ' | ' + data[i].jam + '</option>';
					}
					$('#jadwal').html(html);
				}
			});
			return false;
		});

	});
</script>
</body>

</html>