<?php $this->load->view('components/header') ?>

<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?= base_url('dashboard') ?>" class="headerButton goBack">
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
						<th>Dojang</th>
						<th>Pelatih</th>
						<th>Tanggal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (empty($data_jadwal)) {
						echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
					} else {
						$no = 1;
						foreach ($data_jadwal as $item) { ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
								<td><a href="" data-id="<?= $item->id_jadwal ?>" data-bs-toggle="offcanvas" data-bs-target="#actionSheetShare"><?= $item->nama_dojang ?></a></td>
								<td><?= $item->nama_pelatih ?></td>
								<td><?= longdate_indo($item->tanggal) ?></td>
								<td>
									<button class="btn btn-primary btn-sm edit-jadwal" data-id="<?= $item->id_jadwal ?>" data-bs-target="#ModalEditJadwal" data-bs-toggle="modal">
										<ion-icon name="create-outline"></ion-icon>
									</button>
									<button class="btn btn-danger btn-sm hapus-jadwal" data-id="<?= $item->id_jadwal ?>" data-bs-target="#modalhapus" data-bs-toggle="modal">
										<ion-icon name="trash-outline"></ion-icon>
									</button>
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
		<h5 class="offcanvas-title">Detail Jadwal</h5>
	</div>
	<div class="offcanvas-body">
		<div id="jadwalDetail">

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
	<a href="#" data-bs-toggle="modal" data-bs-target="#ModalForm" class="item">
		<div class="col">
			<div class="action-button">
				<ion-icon name="add-outline"></ion-icon>
			</div>
		</div>
	</a>
	<a href="<?= base_url('jadwal') ?>" class="item active">
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
			<form id="hapusJadwalForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="tanggal"></span>
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
<div class="modal fade modalbox" id="ModalEditJadwal" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Jadwal</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Jadwal</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editJadwalForm" method="post">
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
									<label class="form-label" for="edit_id_pelatih">Pelatih <small class="text-danger">*</small></label>
									<select name="id_pelatih" id="edit_id_pelatih" class="form-control">
										<option selected disabled> Pilih Pelatih</option>
										<?php if (!empty($data_pelatih)) {
											foreach ($data_pelatih as $item) { ?>
												<option value="<?= $item->id_pelatih ?>"><?= $item->nama_pelatih ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_id_kategori">Kategori Sabuk <small class="text-danger">*</small></label>
									<select name="id_kategori" id="edit_id_kategori" class="form-control">
										<option selected disabled> Pilih Kategori</option>
										<?php if (!empty($data_kategori)) {
											foreach ($data_kategori as $item) { ?>
												<option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_tempat">Alamat <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_tempat" name="tempat" placeholder="Alamat" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_tanggal">Waktu <small class="text-danger">*</small></label>
									<input type="datetime-local" class="form-control" id="edit_tanggal" name="tanggal" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_keterangan">Keterangan <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_keterangan" name="keterangan" placeholder="Keterangan" required>
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
				<h5 class="modal-title">Form Tambah Jadwal</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Jadwal</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('jadwal/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="id_dojang">Dojang <small class="text-danger">*</small></label>
									<select name="id_dojang" id="id_dojang" class="form-control">
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
									<label class="form-label" for="id_pelatih">Pelatih <small class="text-danger">*</small></label>
									<select name="id_pelatih" id="id_pelatih" class="form-control">
										<option selected disabled> Pilih Pelatih</option>
										<?php if (!empty($data_pelatih)) {
											foreach ($data_pelatih as $item) { ?>
												<option value="<?= $item->id_pelatih ?>"><?= $item->nama_pelatih ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="id_kategori">Kategori Sabuk <small class="text-danger">*</small></label>
									<select name="id_kategori" id="id_kategori" class="form-control">
										<option selected disabled> Pilih Kategori</option>
										<?php if (!empty($data_kategori)) {
											foreach ($data_kategori as $item) { ?>
												<option value="<?= $item->id_kategori ?>"><?= $item->nama_kategori ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tempat">Alamat <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="tempat" name="tempat" placeholder="Alamat" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tanggal">Waktu <small class="text-danger">*</small></label>
									<input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="keterangan">Keterangan <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
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

<!-- jQuery CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	//	script untuk detail jadwal
	$(document).ready(function() {
		// Event handler untuk menangani klik pada tautan nama atlet
		$('a[data-bs-toggle="offcanvas"]').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tautan

			var jadwalId = $(this).data('id'); // Ambil ID dojang dari data atribut
			console.log("jadwalId : ", jadwalId);
			showJadwalDetail(jadwalId); // Tampilkan detail atlet dalam modal
		});

		// Function untuk menampilkan detail atlet dalam modal
		function showJadwalDetail(jadwalId) {
			$.ajax({
				url: '<?= base_url('jadwal/detail/') ?>' + jadwalId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Konstruksi HTML untuk menampilkan detail atlet
					var html = '<div class="jadwal-detail">';
					html += '<p><strong>Dojang:</strong> ' + response.dojang + '</p>';
					html += '<p><strong>Alamat:</strong> ' + response.tempat + '</p>';
					html += '<p><strong>Pelatih:</strong> ' + response.pelatih + '</p>';
					html += '<p><strong>Tanggal:</strong> ' + response.tanggal + '</p>';
					html += '<p><strong>Kategori:</strong> ' + response.kategori + '</p>';
					html += '<p><strong>Keterangan:</strong> ' + response.keterangan + '</p>';
					html += '</div>';

					// Isi modal dengan informasi atlet yang diterima
					$('#jadwalDetail').html(html);
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
	// 	./script untuk detail jadwal

	// script untuk  edit jadwal
	$(document).ready(function() {
		$('.edit-jadwal').click(function(event) {
			event.preventDefault();

			var jadwalId = $(this).data('id');
			console.log("jadwal ID : ", jadwalId);
			showEditDojangForm(jadwalId);
		});

		function showEditDojangForm(jadwalId) {
			$.ajax({
				url: '<?= base_url('jadwal/detail/') ?>' + jadwalId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					$('#edit_id_dojang').val(response.id_dojang);
					$('#edit_id_pelatih').val(response.id_pelatih);
					$('#edit_id_kategori').val(response.id_kategori);
					$('#edit_tempat').val(response.tempat);
					$('#edit_tanggal').val(response.tanggal);
					$('#edit_keterangan').val(response.keterangan);


					$('#editJadwalForm').attr('action', '<?= base_url('jadwal/update/') ?>' + jadwalId);

					$('#ModalEditJadwal').modal('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tampilkan pesan error jika terjadi kesalahan
					alert('Terjadi kesalahan. Silakan coba lagi.');
				}
			});
		}
	})
	// script untuk  edit jadwal

	// script untuk hapus jadwal
	$(document).ready(function() {
		$('.hapus-jadwal').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tombol

			var jadwalId = $(this).data('id');
			console.log("Jadwal ID:", jadwalId);
			showHapusDojangForm(jadwalId); // Tampilkan form edit atlet dalam modal
		});

		function showHapusDojangForm(jadwalId) {
			$.ajax({
				url: '<?= base_url('jadwal/detail/') ?>' + jadwalId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#tanggal').text(response.tanggal);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') 
										?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);

					// Ubah action form menjadi update
					$('#hapusJadwalForm').attr('action', '<?= base_url('jadwal/delete/') ?>' + jadwalId);

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
	// ./script untuk hapus jadwal
</script>


<?php $this->load->view('components/footer') ?>