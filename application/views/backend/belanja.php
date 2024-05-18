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
					<th>No</th>
					<th>Belanja</th>
					<th>Tanggal</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				if (empty($data_belanja)) {
					echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
				}else {
					$no = 1;
					foreach ($data_belanja as $item) { ?>
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td><?= $item->nama_belanja ?></td>
							<td><?= $item->tanggal_belanja ?></td>
							<td>
								<button class="btn btn-primary btn-sm edit-belanja" data-id="<?= $item->id_belanja ?>" data-bs-target="#ModalEditBelanja" data-bs-toggle="modal"><ion-icon name="create-outline"></button>
								<button class="btn btn-danger btn-sm hapus-belanja" data-id="<?= $item->id_belanja ?>" data-bs-target="#ModalhapusBelanja" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>
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
<div class="modal fade" id="ModalhapusBelanja" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Kategori belanja</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusBelanjaForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="nama-belanja"></span>
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
				<h5 class="modal-title">Form Tambah Belanja</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Belanja</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('belanja/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nama_belanja">Nama Belanja <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="nama_belanja" name="nama_belanja"
										   placeholder="Nama Belanja" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tanggal_belanja">Tanggal <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="tanggal_belanja" name="tanggal_belanja"
										   placeholder="Tanggal Belanja" required>
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
<div class="modal fade modalbox" id="ModalEditBelanja" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Kategori Belanja</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Kategori Belanja</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editBelanjaForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nama_belanja">Nama Kategori <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nama_belanja" name="nama_belanja"
										   placeholder="Nama Kategori" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tanggal_belanja">Tanggal <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="edit_tanggal_belanja" name="tanggal_belanja"
										   placeholder="Tanggal Kategori" required>
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
		$('.edit-belanja').click(function (event){
			event.preventDefault();

			var belanjaId = $(this).data('id');
			console.log("Dojang ID : ", belanjaId);
			showEditIuranForm(belanjaId);
		});

		function showEditIuranForm(belanjaId) {
			$.ajax({
				url: '<?= base_url('belanja/detail/') ?>' + belanjaId,
				method: 'GET',
				dataType: 'json',
				success: function (response){
					$('#edit_nama_belanja').val(response.nama_belanja);
					$('#edit_tanggal_belanja').val(response.tanggal_belanja);


					$('#editBelanjaForm').attr('action', '<?= base_url('belanja/update/') ?>' + belanjaId);

					$('#ModalEditKategori').modal('show');
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
		$('.hapus-belanja').click(function (event){
			event.preventDefault(); // Mencegah aksi default dari tombol

			var belanjaId = $(this).data('id');
			console.log("Iuran ID:", belanjaId);
			showHapusBelanjaForm(belanjaId); // Tampilkan form edit atlet dalam modal
		});
		function showHapusBelanjaForm(belanjaId) {
			$.ajax({
				url: '<?= base_url('belanja/detail/') ?>' + belanjaId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#nama-belanja').text(response.nama_belanja);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);

					// Ubah action form menjadi update
					$('#hapusBelanjaForm').attr('action', '<?= base_url('belanja/delete/') ?>' + belanjaId);

					// Tampilkan modal
					$('#ModalhapusBelanja').modal('show');
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
