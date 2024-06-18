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
					<th>Dojang</th>
					<th>Atlet</th>
					<th>Nominal Iuran</th>
					<th>Nominal Pembayaran</th>
					<th>Sisa</th>
					<th>Pembayaran-Ke</th>
					<th>Tanggal</th>
					<th>Bukti</th>
					<th>Tanggal</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (empty($data_pembayaran)) {
					echo '<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>';
				} else {
					$no = 1;
					foreach ($data_pembayaran as $item) { ?>
						<tr class="text-center">
							<td><?= $no++ ?></td>
							<td>
								<a href="" data-id="<?= $item->id_pembayaran ?>" data-bs-toggle="offcanvas"
								   data-bs-target="#actionSheetShare"><?= $item->nama_dojang ?></a>
							</td>
							<td><?= $item->nama_atlet ?></td>
							<td><?= 'Rp.' . number_format($item->nominal) ?></td>
							<td><?= 'Rp.'. number_format($item->nominal_pembayaran) ?></td>
							<td><?= 'Rp.' . number_format($item->sisa) ?></td>
							<td><?= $item->jumlah_pembayaran ?></td>
							<td><?= longdate_indo($item->tgl_bayar) ?> </td>
							<td>
								<a href="<?= base_url('uploads/bukti_bayar/' .$item->bukti_bayar) ?>">Lihat Bukti</a>
							</td>
							<td>
								<button class="btn btn-primary btn-sm edit-pembayaran" data-id="<?= $item->id_pembayaran ?>" data-bs-target="#ModalEditPembayaran" data-bs-toggle="modal"><ion-icon name="create-outline"></ion-icon></button>
								<button class="btn btn-danger btn-sm hapus-pembayaran" data-id="<?= $item->id_pembayaran ?>" data-bs-target="#modalhapus" data-bs-toggle="modal"><ion-icon name="trash-outline"></ion-icon></button>
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

<!-- Modal Edit -->
<div class="modal fade modalbox" id="ModalEditPembayaran" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Edit Pembayaran</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Edit Pembayaran</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form id="editPembayaranForm" method="post" enctype="multipart/form-data">
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
									<label class="form-label" for="edit_id_atlet">Atlet <small class="text-danger">*</small></label>
									<select name="id_atlet" id="edit_id_atlet" class="form-control">
										<option selected disabled> Pilih Atlet</option>
										<?php if (!empty($data_atlet)) {
											foreach ($data_atlet as $item) { ?>
												<option value="<?= $item->id_atlet ?>"><?= $item->nama_atlet ?></option>
											<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_id_iuran">Iuran <small class="text-danger">*</small></label>
									<select name="id_iuran" id="edit_id_iuran" class="form-control" required>
										<option selected disabled> Pilih Iuran</option>
										<?php if (!empty($data_iuran)) { // Pastikan Anda mengirimkan data iuran dari controller
											foreach ($data_iuran as $item) { ?>
												<option value="<?= $item->id_iuran ?>"><?= $item->periode ?></option>
											<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_jumlah_pembayaran">Pembayaran Ke <small class="text-danger">*</small></label>
									<select name="jumlah_pembayaran" id="edit_jumlah_pembayaran" class="form-control" required>
										<option selected disabled> Pilih Pembayaran</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">lunas</option>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_nominal_pembayaran">Nominal <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_nominal_pembayaran" name="nominal_pembayaran"
										   placeholder="Nominal Pembayaran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_metode_pembayaran">Metode Pembayaran <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="edit_metode_pembayaran" name="metode_pembayaran"
										   placeholder="Nama Pelatih" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_bukti_bayar">Bukti Bayar <small class="text-danger">*</small></label>
									<input type="file" class="form-control" id="edit_bukti_bayar" name="bukti_bayar" required>
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
				<h5 class="modal-title">Form Tambah Pembayaran</h5>
				<a href="#" data-bs-dismiss="modal">Close</a>
			</div>
			<div class="modal-body">
				<div class="login-form">
					<div class="section mt-2">
						<h1>Halaman Tambah Pembayaran</h1>
						<h4>Tanda (<small class="text-danger">*</small>) Form Wajib Di Isi</h4>
					</div>
					<div class="section mt-4 mb-5">
						<form action="<?= base_url('pembayaran/insert') ?>" method="post" enctype="multipart/form-data">
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
									<label class="form-label" for="id_atlet">Atlet <small class="text-danger">*</small></label>
									<select name="id_atlet" id="id_atlet" class="form-control">
										<option selected disabled> Pilih Atlet</option>
										<?php if (!empty($data_atlet)) {
											foreach ($data_atlet as $item) { ?>
												<option value="<?= $item->id_atlet ?>"><?= $item->nama_atlet ?></option>
											<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="edit_id_iuran">Iuran <small class="text-danger">*</small></label>
									<select name="id_iuran" id="edit_id_iuran" class="form-control" required>
										<option selected disabled> Pilih Iuran</option>
										<?php if (!empty($data_iuran)) { // Pastikan Anda mengirimkan data iuran dari controller
											foreach ($data_iuran as $item) { ?>
												<option value="<?= $item->id_iuran ?>"><?= $item->periode ?></option>
											<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="jumlah_pembayaran">Pembayaran Ke <small class="text-danger">*</small></label>
									<select name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" required>
										<option selected disabled> Pilih Pembayaran</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">lunas</option>
									</select>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="metode_pembayaran">Metode Pembayaran <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran"
										   placeholder="Metode Pembayaran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="nominal_pembayaran">Nominal <small class="text-danger">*</small></label>
									<input type="text" class="form-control" id="nominal_pembayaran" name="nominal_pembayaran"
										   placeholder="Nominal Pembayaran" required>
									<i class="clear-input">
										<ion-icon name="close-circle"></ion-icon>
									</i>
								</div>
							</div>
							<div class="form-group basic">
								<div class="input-wrapper">
									<label class="form-label" for="bukti_bayar">Bukti Bayar <small class="text-danger">*</small></label>
									<input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" required>
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

<!--Modal Hapus-->
<div class="modal fade" id="modalhapus" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Hapus Atlet</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="hapusPembayaranForm" method="post">
				<div class="modal-body">
					<div class="section">
						Apakah Anda yakin ingin menghapus data <span id="nama_atlet"></span>
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


<!-- jQuery CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	// script untuk  edit pembayaran
	$(document).ready(function() {
		$('.edit-pembayaran').click(function (event) {
			event.preventDefault();
			var pembayaranId = $(this).data('id');
			console.log(pembayaranId);
			showEditPembayaranForm(pembayaranId);
		});

		function showEditPembayaranForm(pembayaranId) {
			$.ajax({
				url: '<?= base_url('pembayaran/detail/') ?>' + pembayaranId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Populate the form fields with the response data
					$('#edit_id_dojang').val(response.id_dojang_pembayaran);
					$('#edit_id_atlet').val(response.id_atlet_pembayaran);
					$('#edit_id_iuran').val(response.id_iuran);
					$('#edit_jumlah_pembayaran').val(response.jumlah_pembayaran);
					$('#edit_nominal_pembayaran').val(response.nominal_pembayaran);
					$('#edit_metode_pembayaran').val(response.metode_pembayaran);

					// Display current file information (if available)
					var buktiBayarLabel = $('label[for="edit_bukti_bayar"]');
					var buktiBayarInput = $('#edit_bukti_bayar');
					if (response.bukti_bayar) {
						buktiBayarLabel.text(`Bukti Bayar (Current: ${response.bukti_bayar})`);
						// Add a link to view/download the existing file if needed
						// Example:
						// buktiBayarLabel.append(` <a href="<?= base_url('uploads/bukti_bayar/') ?>${response.bukti_bayar}" target="_blank">Lihat/Unduh</a>`);
						buktiBayarInput.prop('required', false); // Make the file input optional
					} else {
						buktiBayarLabel.text('Bukti Bayar <small class="text-danger">*</small>'); // Reset to original label
						buktiBayarInput.prop('required', true); // Make file input required again
					}

					// Set the form action to the correct update URL
					$('#editPembayaranForm').attr('action', '<?= base_url('pembayaran/update/') ?>' + pembayaranId);

					// Show the modal
					$('#ModalEditPembayaran').modal('show');
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					alert('Terjadi kesalahan: ' + (xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Silakan coba lagi.'));
				}
			});
		}
	});


	// script untuk hapus jadwal
	$(document).ready(function () {
		$('.hapus-pembayaran').click(function (event){
			event.preventDefault(); // Mencegah aksi default dari tombol

			var pembayaranId = $(this).data('id');
			console.log("Pembayaran ID:", pembayaranId);
			showHapusPembayaranForm(pembayaranId); // Tampilkan form edit atlet dalam modal
		});
		function showHapusPembayaranForm(pembayaranId) {
			$.ajax({
				url: '<?= base_url('pembayaran/detail/') ?>' + pembayaranId,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					// Isi nilai atribut atlet ke dalam form modal hapus
					$('#nama_atlet').text(response.nama_atlet);

					// Ubah action form menjadi update
					//var updateUrl = '<?php //= base_url('atlet/update/') ?>//' + response.id;
					//console.log("Update URL:", updateUrl);
					//$('#editAtletForm').attr('action', updateUrl);

					// Ubah action form menjadi update
					$('#hapusPembayaranForm').attr('action', '<?= base_url('pembayaran/delete/') ?>' + pembayaranId);

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
