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
	<div class="section">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Daftar Atlet</h3>
					<a href="<?= base_url('laporan/cetak_pdf_atlet') ?>" class="btn btn-primary">
						<ion-icon name="print-outline"></ion-icon> Cetak Semua
					</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="laporan_atlet" class="table table-bordered">
							<thead>
							<tr class="text-center">
								<th>No</th>
								<th>Nama Atlet</th>
								<th>Jenis Kelamin</th>
								<th>Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Tempat Lahir</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Masukkan DataTables JS di sini -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function () {
		var dataTable = $('#laporan_atlet').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo base_url('laporan/get_atlet_json'); ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [0, 1, 2, 3, 4, 5, 6],
				"orderable": false,
			}],
		});
	});
</script>

<?php $this->load->view('components/footer') ?>
