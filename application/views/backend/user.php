<?php $this->load->view('components/header') ?>

<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?= base_url('dashboard')?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"><?= $title ?></div>
	<div class="right"></div>
</div>
<!-- * App Header -->

<div id="appCapsule">
	<div class="section mt-3">
		<div class="table-responsive">
			<table id="atlet" class="table table-striped">
				<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Username</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (empty($data_user)) {
					echo '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>';
				} else {
					$no = 1;
					foreach ($data_user as $item) { ?>
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td><a href="" data-id="<?= $item->id_users ?>" data-bs-toggle="offcanvas"
								   data-bs-target="#actionSheetShare"><?= $item->username ?></a></td>
							<td>
								<?php if ($item->role == 1) { ?>
									admin
								<?php }elseif ($item->role == 2) { ?>
									user
								<?php }elseif($item->role == 3) { ?>
									Bendahara
								<?php } ?>
							</td>
							<td>
								<button class="btn btn-primary btn-sm edit-users" data-id="<?= $item->id_users ?>" data-bs-target="#ModalEditPelatih" data-bs-toggle="modal"><ion-icon name="create-outline"></ion-icon></button>
								<button class="btn btn-danger btn-sm hapus-users" data-id="<?= $item->id_users ?>" data-bs-target="#modalhapus" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>
							</td>
						</tr>
					<?php }
				} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="offcanvas offcanvas-bottom action-sheet inset" tabindex="-1" id="actionSheetShare">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title">Detail Pelatih</h5>
	</div>
	<div class="offcanvas-body">
		<div id="pelatihDetail">

		</div>
	</div>
</div>

<!-- App Bottom Menu -->
<div class="appBottomMenu">
	<a href="<?= base_url('dashboard') ?>" class="item">
		<div class="col">
			<ion-icon name="home-outline"></ion-icon>
			<strong>Home</strong>
		</div>
	</a>
	<a href="<?= base_url('atlet') ?>" class="item">
		<div class="col">
			<ion-icon name="man-outline"></ion-icon>
			<strong>Atlet</strong>
		</div>
	</a>
	<a href="#"  data-bs-toggle="modal" data-bs-target="#ModalForm" class="item">
		<div class="col">
			<div class="action-button">
				<ion-icon name="add-outline"></ion-icon>
			</div>
		</div>
	</a>
	<a href="<?= base_url('jadwal') ?>" class="item">
		<div class="col">
			<ion-icon name="hourglass-outline"></ion-icon>
			<strong>Jadwal</strong>
		</div>
	</a>
	<a href="<?= base_url('dojang') ?>" class="item">
		<div class="col">
			<ion-icon name="map-outline"></ion-icon>
			<strong>Dojang</strong>
		</div>
	</a>
</div>
<!-- * App Bottom Menu -->


<!--Modal Hapus-->
<div class="modal fade" id="modalhapus" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Atlet</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusPelatihForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="nama_pelatih"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--* Modal hapus-->

<!-- Modal Edit -->
<div class="modal fade modalbox" id="ModalEditPelatih" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Pelatih</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Pelatih</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editPelatihForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_id_dojang">Dojang <small class="text-danger">*</small></label>
									<select name="id_dojang" id="edit_id_dojang" class="form-control">
										<option selected disabled> Pilih Dojang</option>
										<?php if (!empty($data_dojang)) {
											foreach ($data_dojang as $item) { ?>
												<option value="<?= $item->id_dojang ?>"><?= $item->nama_dojang ?></option>
											<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_nama_pelatih">Nama Pelatih <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nama_pelatih" name="nama_pelatih"
										   placeholder="Nama Pelatih" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_email">Email <small class="text-danger">*</small></label>
									<input type="email" class="form-control" id="edit_email" name="email" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="mt-2">
								<button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Edit -->

<!-- Modal Form -->
<div class="modal fade modalbox" id="ModalForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Tambah User</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah User</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('users/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="username">Username <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="username" name="username"
										   placeholder="Username" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="password">Password <small class="text-danger">*</small></label>
									<input type="password" class="form-control" id="password" name="password"
										   placeholder="Password" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="password2">Konfirmasi Password <small class="text-danger">*</small></label>
									<input type="password" class="form-control" id="password2" name="password2"
										   placeholder="Konfirmasi Password" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="role">Role <small class="text-danger">*</small></label>
									<select name="role" id="role" class="form-control">
										<option selected disabled>Pilih Role</option>
										<option value="1">Admin</option>
										<option value="2">User</option>
									</select>
								</div>
							</div>
							<div class="mt-2">
								<button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Form -->



<?php $this->load->view('components/footer') ?>
