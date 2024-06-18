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
					<th>Nama</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (empty($data_atlet)) {
					echo '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>';
				} else {
					$no = 1;
					foreach ($data_atlet as $item) { ?>
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td><a href="" data-id="<?= $item->id_atlet ?>" data-bs-toggle="offcanvas"
								   data-bs-target="#actionSheetShare"><?= $item->nama_atlet ?></a></td>
							<td><?= $item->alamat ?></td>
							<td>
								<?php if($this->session->userdata('role') == '1') { ?>
								<button class="btn btn-primary btn-sm edit-atlet" data-id="<?= $item->id_atlet ?>" data-bs-target="#modaledit" data-bs-toggle="modal"><ion-icon name="create-outline"></ion-icon></button>

								<button class="btn btn-danger btn-sm hapus-atlet" data-id="<?= $item->id_atlet ?>" data-bs-target="#modalhapus" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>

								<button class="btn btn-info" type="submit">
									<ion-icon name="print-outline"></ion-icon>
								</button>
								<?php } else { ?>
									Tidak Memiliki Akses
								<?php } ?>
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
		<h5 class="offcanvas-title">Detail Atlet</h5>
	</div>
	<div class="offcanvas-body">
		<div id="atletDetail">

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
	<a href="#" class="item active">
		<div class="col">
			<ion-icon name="man-outline"></ion-icon>
			<strong>Atlet</strong>
		</div>
	</a>
	<?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2'){ ?>
		<a href="#"  data-bs-toggle="modal" data-bs-target="#ModalForm" class="item">
			<div class="col">
				<div class="action-button">
					<ion-icon name="add-outline"></ion-icon>
				</div>
			</div>
		</a>
	<?php } ?>
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

<!-- Modal Form Hapus -->
<div class="modal fade" id="modalhapus" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Atlet</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusAtletForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="nama-atlet"></span>
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
<!-- * Modal Form Hapus -->

<!-- Modal Form Edit -->
<div class="modal fade modalbox" id="modaledit" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Atlet</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Atlet</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editAtletForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_nama_atlet">Nama Atlet <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nama_atlet" name="nama_atlet"
										   placeholder="Nama Atlet" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_email">E-Email <small class="text-danger">*</small></label>
									<input type="email" class="form-control" id="edit_email" name="email"
										   placeholder="Email" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_alamat">Alamat <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_alamat" name="alamat"
										   placeholder="Alamat" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_jenis_kelamin">Jenis Kelamin <small class="text-danger">*</small></label>
									<select name="jenis_kelamin" id="edit_jenis_kelamin" class="form-control" required>
										<option selected disabled>Pilih Jenis Kelamin</option>
										<option value="Perempuan">Perempuan</option>
										<option value="Laki-Laki">Laki - Laki</option>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_tgl_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="edit_tgl_lahir" name="tgl_lahir" required>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_tempat_lahir"
										   autocomplete="off" placeholder="Tempat Lahir" name="tempat_lahir" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="mt-2">
								<button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- * Modal Form Edit -->


<!-- Modal Form -->
<div class="modal fade modalbox" id="ModalForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Tambah Atlet</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Atlet</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('atlet/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nama_atlet">Nama Atlet <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="nama_atlet" name="nama_atlet"
										   placeholder="Nama Atlet" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="email">E-Email <small class="text-danger">*</small></label>
									<input type="email" class="form-control" id="email" name="email"
										   placeholder="email" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="alamat">Alamat <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="alamat" name="alamat"
										   placeholder="Alamat" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>

							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="jenis_kelamin">Jenis Kelamin <small class="text-danger">*</small></label>
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
										<option selected disabled>Pilih Jenis Kelamin</option>
										<option value="Perempuan">Perempuan</option>
										<option value="Laki-Laki">Laki - Laki</option>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tgl_lahir">Tanggal Lahir <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tempat_lahir">Tempat Lahir <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="tempat_lahir"
										   autocomplete="off" placeholder="Tempat Lahir" name="tempat_lahir" required>
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
<!-- * Modal Form -->

<!-- jQuery (pastikan Anda telah memasang jQuery sebelumnya) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function() {
		// Event handler untuk menangani klik pada tautan nama atlet
		$('a[data-bs-toggle="offcanvas"]').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tautan

			var atletId = $(this).data('id'); // Ambil ID atlet dari data atribut
			showAtletDetail(atletId); // Tampilkan detail atlet dalam modal
		});

		// Function untuk menampilkan detail atlet dalam modal
		function showAtletDetail(atletId) {
			$.ajax({
				url: '<?= base_url('atlet/detail/') ?>' + atletId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Konstruksi HTML untuk menampilkan detail atlet
					var html = '<div class="atlet-detail">';
					html += '<p><strong>Nama:</strong> ' + response.nama_atlet + '</p>';
					html += '<p><strong>Jenis Kelamin:</strong> ' + response.jenis_kelamin + '</p>';
					html += '<p><strong>Tanggal Lahir:</strong> ' + response.tgl_lahir + '</p>';
					html += '<p><strong>Alamat:</strong> ' + response.alamat + '</p>';
					html += '<p><strong>Tempat Lahir:</strong> ' + response.tempat_lahir + '</p>';
					html += '<p><strong>Email:</strong> ' + response.email + '</p>';
					html += '</div>';

					// Isi modal dengan informasi atlet yang diterima
					$('#atletDetail').html(html);
					// Tampilkan modal
					$('#actionSheetShare').offcanvas('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tampilkan pesan error jika terjadi kesalahan
					alert('Terjadi kesalahan. Silakan coba lagi.');
				}
			});
		}
	});
</script>

<script>
	$(document).ready(function() {
		// Event handler untuk menangani klik pada tombol edit-atlet
		$('.edit-atlet').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tombol

			var atletId = $(this).data('id');
			console.log("Atlet ID:", atletId);
			showEditAtletForm(atletId); // Tampilkan form edit atlet dalam modal
		});

		// Function untuk menampilkan form edit atlet dalam modal
		function showEditAtletForm(atletId) {
			$.ajax({
				url: '<?= base_url('atlet/detail/') ?>' + atletId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal edit
					$('#edit_nama_atlet').val(response.nama_atlet);
					$('#edit_email').val(response.email);
					$('#edit_alamat').val(response.alamat);
					$('#edit_jenis_kelamin').val(response.jenis_kelamin);
					$('#edit_tgl_lahir').val(response.tgl_lahir);
					$('#edit_tempat_lahir').val(response.tempat_lahir);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);


					// Ubah action form menjadi update
					$('#editAtletForm').attr('action', '<?= base_url('atlet/update/') ?>' + atletId);

					// Tampilkan modal
					$('#modaledit').modal('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tampilkan pesan error jika terjadi kesalahan
					alert('Terjadi kesalahan. Silakan coba lagi.');
				}
			});
		}
	});
</script>

<script>
	$(document).ready(function () {
		$('.hapus-atlet').click(function (event){
			event.preventDefault(); // Mencegah aksi default dari tombol

			var atletId = $(this).data('id');
			console.log("Atlet ID:", atletId);
			showHapusAtletForm(atletId); // Tampilkan form edit atlet dalam modal
		});
		function showHapusAtletForm(atletId) {
			$.ajax({
				url: '<?= base_url('atlet/detail/') ?>' + atletId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#nama-atlet').text(response.nama_atlet);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);


					// Ubah action form menjadi update
					$('#hapusAtletForm').attr('action', '<?= base_url('atlet/delete/') ?>' + atletId);

					// Tampilkan modal
					$('#modalhapus').modal('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tampilkan pesan error jika terjadi kesalahan
					alert('Terjadi kesalahan. Silakan coba lagi.');
				}
			});
		}
	})
</script>



<?php $this->load->view('components/footer') ?>


