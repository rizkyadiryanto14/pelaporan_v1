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
					<th>No.Regis</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (empty($data_dojang)) {
					echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
				} else {
					$no = 1;
					foreach ($data_dojang as $item) { ?>
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td><?= $item->no_registrasi ?></td>
							<td><a href="" data-id="<?= $item->id_dojang ?>" data-bs-toggle="offcanvas"
								   data-bs-target="#actionSheetShare"><?= $item->nama_dojang ?></a></td>
							<td><?= $item->alamat ?></td>
							<td>
								<button class="btn btn-primary btn-sm edit-dojang" data-id="<?= $item->id_dojang ?>" data-bs-target="#ModalEditDojang" data-bs-toggle="modal"><ion-icon name="create-outline"></ion-icon></button>

								<button class="btn btn-danger btn-sm hapus-dojang" data-id="<?= $item->id_dojang ?>" data-bs-target="#modalhapus" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>
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
		<h5 class="offcanvas-title">Detail Dojang</h5>
	</div>
	<div class="offcanvas-body">
		<div id="dojangDetail">
			<!-- Di isi menggunakan jquery-->
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
	<a href="<?= base_url('dojang') ?>" class="item active">
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
				<h5 class="modal-title">Form Hapus Dojang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusDojangForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="nama-dojang"></span>
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
<div class="modal fade modalbox" id="ModalEditDojang" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Dojang</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Dojang</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editDojangForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_no_registrasi">No. Registrasi <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_no_registrasi" name="no_registrasi"
										   placeholder="Nomor Registrasi" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_nama_dojang">Nama Dojang <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nama_dojang" name="nama_dojang"
										   placeholder="Nama Dojang" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_email">E-Email <small class="text-danger">*</small></label>
									<input type="email" class="form-control" id="edit_email" name="email"
										   placeholder="email" required>
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
									<label class="form-label" for="edit_no_telepon">No Telepon <small class="text-danger">*</small></label>
									<input type="number" class="form-control" id="edit_no_telepon" name="no_telepon"
										   placeholder="Nomor Telepon" required>
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
				<h5 class="modal-title">Form Tambah Dojang</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Dojang</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('dojang/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="no_registrasi">No. Registrasi <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="no_registrasi" name="no_registrasi"
										   placeholder="Nomor Registrasi" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nama_dojang">Nama Dojang <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="nama_dojang" name="nama_dojang"
										   placeholder="Nama Dojang" required>
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
									<label class="form-label" for="no_telepon">No Telepon <small class="text-danger">*</small></label>
									<input type="number" class="form-control" id="no_telepon" name="no_telepon"
										   placeholder="Nomor Telepon" required>
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
//	script untuk detail dojang
	$(document).ready(function() {
		// Event handler untuk menangani klik pada tautan nama atlet
		$('a[data-bs-toggle="offcanvas"]').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tautan

			var dojangId = $(this).data('id'); // Ambil ID dojang dari data atribut
			showDojangDetail(dojangId); // Tampilkan detail atlet dalam modal
		});

		// Function untuk menampilkan detail atlet dalam modal
		function showDojangDetail(dojangId) {
			$.ajax({
				url: '<?= base_url('dojang/detail/') ?>' + dojangId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Konstruksi HTML untuk menampilkan detail atlet
					var html = '<div class="dojang-detail">';
					html += '<p><strong>Nama:</strong> ' + response.nama_dojang + '</p>';
					html += '<p><strong>Alamat:</strong> ' + response.alamat + '</p>';
					html += '<p><strong>No.Telpn:</strong> ' + response.no_telepon + '</p>';
					html += '<p><strong>No.Registrasi:</strong> ' + response.no_registrasi + '</p>';
					html += '<p><strong>Email:</strong> ' + response.email + '</p>';
					html += '</div>';

					// Isi modal dengan informasi atlet yang diterima
					$('#dojangDetail').html(html);
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
// 	./script untuk detail dojang

// script untuk edit dojang
$(document).ready(function (){
	$('.edit-dojang').click(function (event){
		event.preventDefault();

		var dojangId = $(this).data('id');
		console.log("Dojang ID : ", dojangId);
		showEditDojangForm(dojangId);
	});

	function showEditDojangForm(dojangId) {
		$.ajax({
			url: '<?= base_url('dojang/detail/') ?>' + dojangId,
			method: 'GET',
			dataType: 'json',
			success: function (response){
				$('#edit_no_registrasi').val(response.no_registrasi);
				$('#edit_nama_dojang').val(response.nama_dojang);
				$('#edit_alamat').val(response.alamat);
				$('#edit_no_telepon').val(response.no_telepon);
				$('#edit_email').val(response.email);


				$('#editDojangForm').attr('action', '<?= base_url('dojang/update/') ?>' + dojangId);

				$('#ModalEditDojang').modal('show');
			},
			error: function(xhr, status, error) {
				console.error(xhr.responseText);
				// Tampilkan pesan error jika terjadi kesalahan
				alert('Terjadi kesalahan. Silakan coba lagi.');
			}
		});
	}
})


$(document).ready(function () {
	$('.hapus-dojang').click(function (event){
		event.preventDefault(); // Mencegah aksi default dari tombol

		var dojangId = $(this).data('id');
		console.log("Atlet ID:", dojangId);
		showHapusDojangForm(dojangId); // Tampilkan form edit atlet dalam modal
	});
	function showHapusDojangForm(dojangId) {
		$.ajax({
			url: '<?= base_url('dojang/detail/') ?>' + dojangId,
			method: 'GET',
			dataType: 'json',
			success: function(response) {
				// Isi nilai atribut atlet ke dalam form modal hapus
				$('#nama-dojang').text(response.nama_dojang);

				// Ubah action form menjadi update
				//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
				//console.log("Update URL:", updateUrl);
				//$('#editAtletForm').attr('action', updateUrl);

				// Ubah action form menjadi update
				$('#hapusDojangForm').attr('action', '<?= base_url('dojang/delete/') ?>' + dojangId);

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
