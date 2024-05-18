<!--File Header -->
<?php $this->load->view('components/header') ?>
<!--./File Header-->

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
	<div class="section mb-3">
		<div class="table-responsive">
			<table class="table table-responsive">
				<thead>
					<tr>
						<th>No</th>
						<th>Belanja</th>
						<th>Kategori</th>
						<th>Anggaran</th>
						<th>Dojang</th>
						<th>Tanggal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					if (empty($data_anggaran)) {
						echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
					} else {
						$no = 1;
						foreach ($data_anggaran as $item) { ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
								<td><?= $item->nama_belanja ?></td>
								<td><?= $item->nama_kategori ?></td>
								<td>Rp.<?= number_format($item->nilai_anggaran) ?></td>
								<td><?= $item->nama_dojang ?></td>
								<td><?=longdate_indo( $item->tanggal_anggaran) ?></td>
								<td>
									<button class="btn btn-primary btn-sm edit-anggaran" data-id="<?= $item->id_anggaran ?>" data-bs-target="#ModalEditAnggaran" data-bs-toggle="modal">
										<ion-icon name="create-outline">
									</button>
									<button class="btn btn-danger btn-sm hapus-anggaran" data-id="<?= $item->id_anggaran ?>" data-bs-target="#ModalhapusAnggaran" data-bs-toggle="modal">
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
<div class="modal fade" id="ModalhapusAnggaran" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Kategori belanja</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusAnggaranForm" method="post">
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
				<h5 class="modal-title">Form Tambah Anggaran</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Anggaran</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('anggaran/insert') ?>" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="id_belanja">Belanja <small class="text-danger">*</small></label>
									<select name="id_belanja" id="id_belanja" class="form-control">
										<option selected disabled>Pilih Belanja</option>
										<?php foreach ($data_belanja as $item) { ?>
											<option value="<?= $item->id_belanja ?>"><?= $item->nama_belanja ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="input-wrapper">
									<label class="form-label" for="kategori_belanja">Kategori Belanja <small class="text-danger">*</small></label>
									<select name="id_kategori_belanja" id="kategori_belanja" class="form-control">
										<option selected disabled>Pilih Kategori</option>
										<?php foreach ($data_kategori_belanja as $item) { ?>
											<option value="<?= $item->id_kategori_belanja ?>"><?= $item->nama_kategori ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="input-wrapper">
									<label class="form-label" for="id_dojang">Dojang <small class="text-danger">*</small></label>
									<select name="id_dojang" id="id_dojang" class="form-control">
										<option selected disabled>Pilih Dojang</option>
										<?php foreach ($data_dojang as $item) { ?>
											<option value="<?= $item->id_dojang ?>"><?= $item->nama_dojang ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nilai_anggaran">Anggaran <small class="text-danger">*</small></label>
									<input type="number" class="form-control" id="nilai_anggaran" name="nilai_anggaran" placeholder="Anggaran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tanggal_anggaran">Tanggal <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="tanggal_anggaran" name="tanggal_anggaran" placeholder="Tanggal Belanja" required>
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
<div class="modal fade modalbox" id="ModalEditAnggaran" data-bs-backdrop="static" tabindex="-1" role="dialog">
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
						<form id="editanggaranForm" method="post">
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="id_belanja">Belanja <small class="text-danger">*</small></label>
									<select name="id_belanja" id="edit_id_belanja" class="form-control">
										<option selected disabled>Pilih Belanja</option>
										<?php foreach ($data_belanja as $item) { ?>
											<option value="<?= $item->id_belanja ?>"><?= $item->nama_belanja ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="input-wrapper">
									<label class="form-label" for="edit_id_kategori_belanja">Kategori Belanja <small class="text-danger">*</small></label>
									<select name="id_kategori_belanja" id="edit_id_kategori_belanja" class="form-control">
										<option selected disabled>Pilih Kategori</option>
										<?php foreach ($data_kategori_belanja as $item) { ?>
											<option value="<?= $item->id_kategori_belanja ?>"><?= $item->nama_kategori ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="input-wrapper">
									<label class="form-label" for="id_dojang">Dojang <small class="text-danger">*</small></label>
									<select name="id_dojang" id="edit_id_dojang" class="form-control">
										<option selected disabled>Pilih Dojang</option>
										<?php foreach ($data_dojang as $item) { ?>
											<option value="<?= $item->id_dojang ?>"><?= $item->nama_dojang ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nilai_anggaran">Anggaran <small class="text-danger">*</small></label>
									<input type="number" class="form-control" id="edit_nilai_anggaran" name="nilai_anggaran" placeholder="Anggaran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="tanggal_anggaran">Tanggal <small class="text-danger">*</small></label>
									<input type="date" class="form-control" id="edit_tanggal_anggaran" name="tanggal_anggaran" placeholder="Tanggal Belanja" required>
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
	$(document).ready(function() {
		$('.edit-anggaran').click(function(event) {
			event.preventDefault();

			var anggaranId = $(this).data('id');
			console.log("anggaran ID : ", anggaranId);
			showEditIuranForm(anggaranId);
		});

		function showEditIuranForm(anggaranId) {
			$.ajax({
				url: '<?= base_url('anggaran/detail/') ?>' + anggaranId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					$('#edit_id_belanja').val(response.id_belanja);
					$('#edit_id_kategori_belanja').val(response.id_kategori_belanja);
					$('#edit_id_dojang').val(response.id_dojang);
					$('#edit_tanggal_anggaran').val(response.tanggal_anggaran);
					$('#edit_nilai_anggaran').val(response.nilai_anggaran);



					$('#editanggaranForm').attr('action', '<?= base_url('anggaran/update/') ?>' + anggaranId);

					$('#ModalEditAnggaran').modal('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tampilkan pesan error jika terjadi kesalahan
					alert('Terjadi kesalahan. Silakan coba lagi.');
				}
			});
		}
	})


	$(document).ready(function() {
		$('.hapus-anggaran').click(function(event) {
			event.preventDefault(); // Mencegah aksi default dari tombol

			var anggaranId = $(this).data('id');
			console.log("Iuran ID:", anggaranId);
			showHapusBelanjaForm(anggaranId); // Tampilkan form edit atlet dalam modal
		});

		function showHapusBelanjaForm(anggaranId) {
			$.ajax({
				url: '<?= base_url('anggaran/detail/') ?>' + anggaranId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#nama-belanja').text(response.nama_belanja);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') 
										?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);

					// Ubah action form menjadi update
					$('#hapusAnggaranForm').attr('action', '<?= base_url('anggaran/delete/') ?>' + anggaranId);

					// Tampilkan modal
					$('#ModalhapusAnggaran').modal('show');
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
