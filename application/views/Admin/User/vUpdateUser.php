<div class="container-fluid">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title fw-semibold mb-4">Update Data User</h5>
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('Admin/cUser/update/' . $user->id_user) ?>" method="POST">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Nama User</label>
								<input type="text" value="<?= $user->nama_user ?>" name="nama" class="form-control" id="input-1" placeholder="Masukkan Nama User">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
								<select name="jk" class="form-control">
									<option value="">---Pilih Jenis Kelamin---</option>
									<option value="Laki - Laki" <?php if ($user->jk == 'Laki - Laki') {
																	echo 'selected';
																}  ?>>Laki - Laki</option>
									<option value="Perempuan" <?php if ($user->jk == 'Perempuan') {
																	echo 'selected';
																}  ?>>Perempuan</option>
								</select>
								<?= form_error('jk', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Alamat</label>
								<input type="text" value="<?= $user->alamat ?>" name="alamat" class="form-control" id="input-2" placeholder="Masukkan Alamat">
								<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">No Telepon</label>
								<input type="text" name="no_hp" value="<?= $user->no_telp ?>" class="form-control" id="input-3" placeholder="Masukkan No Telepon">
								<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Username</label>
								<input type="text" name="username" value="<?= $user->username ?>" class="form-control" id="input-4" placeholder="Masukkan Username">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Password</label>
								<input type="text" name="password" value="<?= $user->password ?>" class="form-control" id="input-5" placeholder="Masukkan Password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Level User</label>
								<select name="level" class="form-control">
									<option value="">---Pilih Level User---</option>
									<option value="1" <?php if ($user->level_user == '1') {
															echo 'selected';
														}  ?>>Admin</option>
									<option value="2" <?php if ($user->level_user == '2') {
															echo 'selected';
														}  ?>>Rekam Medis ISPA</option>
									<option value="3" <?php if ($user->level_user == '3') {
															echo 'selected';
														}  ?>>Rekam Medis Pneumonia</option>
									<option value="4" <?php if ($user->level_user == '4') {
															echo 'selected';
														}  ?>>Rekam Medis TBC</option>
									<option value="5" <?php if ($user->level_user == '5') {
															echo 'selected';
														}  ?>>Rekam Medis Diare</option>
								</select>
								<?= form_error('level', '<small class="text-danger">', '</small>') ?>
							</div>

							<div class="mb-3">
								<button type="submit" class="btn btn-success px-5"><i class="icon-lock"></i> Save</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>