<!--  Main wrapper -->
<div class="body-wrapper">
	<!--  Header Start -->
	<header class="app-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item d-block d-xl-none">
					<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
						<i class="ti ti-menu-2"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link nav-icon-hover" href="<?= base_url('Admin/cBokingPasien') ?>">
						<i class="ti ti-bell-ringing"></i>
						<?php
						$notif = $this->db->query("SELECT COUNT(id_boking) as notif FROM `boking_jdwl` WHERE stat_boking ='0'")->row();
						?>
						<span class="badge bg-info"><?= $notif->notif ?></span>
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<!--  Header End -->