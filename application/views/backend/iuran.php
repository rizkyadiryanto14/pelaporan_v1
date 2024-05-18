<!--File Header -->
<?php $this->load->view('components/header') ?>
<!--./File Header-->

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
	<div class="section mb-3">
		<div class="table-responsive">
			<table class="table table-responsive">
				<thead>
				<tr>
					<th>Kode</th>
					<th>Nominal</th>
					<th>Keterangan</th>
					<th>Tempo</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (empty($data_iuran)) {
					echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
				}else {
					$no = 1;
					foreach ($data_iuran as $item) { ?>
						<tr class="text-center">
							<td><?= $item->kode_iuran ?></td>
							<td>Rp.<?= number_format($item->nominal) ?></td>
							<td><?= $item->keterangan_iuran ?></td>
							<td><?= longdate_indo($item->jatuh_tempo) ?></td>
							<td>
								<button class="btn btn-primary btn-sm edit-iuran" data-id="<?= $item->id_iuran ?>" data-bs-target="#ModalEditIuran" data-bs-toggle="modal"><ion-icon name="create-outline"></button>
								<button class="btn btn-danger btn-sm hapus-iuran" data-id="<?= $item->id_iuran ?>"data-bs-target="#ModalhapusIuran" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>
							</td>
						</tr>
					<?php }
				} ?>
				</tbody>
			</table>
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

<!--File sidebar-->
<?php $this->load->view('components/sidebar') ?>
<!--./File sidebar-->

<!--Modal Hapus-->
<div class="modal fade" id="ModalhapusIuran" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Iuran</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusIuranForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="keterangan_iuran"></span>
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

<!-- Modal Form -->
<div class="modal fade modalbox" id="ModalForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Tambah Iuran</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Iuran</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('iuran/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="kode_iuran">Kode Iuran <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="kode_iuran" name="kode_iuran"
										   placeholder="Kode Iuran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nominal">Nominal <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="nominal" name="nominal"
										   placeholder="nominal" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="jatuh_tempo">Jatuh Tempo <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo"
										   placeholder="Jatuh Tempo" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="keterangan_iuran">Keterangan <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="keterangan_iuran" name="keterangan_iuran"
										   placeholder="Keterangan" required>
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

<!-- Modal edit Form -->
<div class="modal fade modalbox" id="ModalEditIuran" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Iuran</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Iuran</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editIuranForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_kode_iuran">Kode Iuran <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_kode_iuran" name="kode_iuran"
										   placeholder="Kode Iuran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_nominal">Nominal <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nominal" name="nominal"
										   placeholder="nominal" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_jatuh_tempo">Jatuh Tempo <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="edit_jatuh_tempo" name="jatuh_tempo"
										   placeholder="Jatuh Tempo" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_keterangan_iuran">Keterangan <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_keterangan_iuran" name="keterangan_iuran"
										   placeholder="Keterangan" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).ready(function (){
		$('.edit-iuran').click(function (event){
			event.preventDefault();

			var iuranId = $(this).data('id');
			console.log("Dojang ID : ", iuranId);
			showEditIuranForm(iuranId);
		});

		function showEditIuranForm(iuranId) {
			$.ajax({
				url: '<?= base_url('iuran/detail/') ?>' + iuranId,
				method: 'GET',
				dataType: 'json',
				success: function (response){
					$('#edit_kode_iuran').val(response.kode_iuran);
					$('#edit_nominal').val(response.nominal);
					$('#edit_jatuh_tempo').val(response.jatuh_tempo);
					$('#edit_keterangan_iuran').val(response.keterangan_iuran);


					$('#editIuranForm').attr('action', '<?= base_url('iuran/update/') ?>' + iuranId);

					$('#ModalEditIuran').modal('show');
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
		$('.hapus-iuran').click(function (event){
			event.preventDefault(); // Mencegah aksi default dari tombol

			var iuranId = $(this).data('id');
			console.log("Iuran ID:", iuranId);
			showHapusDojangForm(iuranId); // Tampilkan form edit atlet dalam modal
		});
		function showHapusDojangForm(iuranId) {
			$.ajax({
				url: '<?= base_url('iuran/detail/') ?>' + iuranId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#keterangan_iuran').text(response.keterangan_iuran);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);

					// Ubah action form menjadi update
					$('#hapusIuranForm').attr('action', '<?= base_url('iuran/delete/') ?>' + iuranId);

					// Tampilkan modal
					$('#ModalhapusIuran').modal('show');
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

<!--File Footer-->
<?php $this->load->view('components/footer') ?>
