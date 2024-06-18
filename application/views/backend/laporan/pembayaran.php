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
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-12 col-md-6 mb-2 mb-md-0 d-flex align-items-center">
						<a href="<?= base_url('laporan/cetak_pdf_pembayaran') ?>" class="btn btn-primary">
							<ion-icon name="print-outline"></ion-icon> Cetak Semua
						</a>
					</div>
					<div class="col-12 col-md-6 d-flex align-items-center">
						<form method="get" action="<?= base_url('laporan/cetak_pdf_pembayaran_filter') ?>" class="row g-3 flex-fill">
							<div class="col-6 col-md-5">
								<select name="bulan" class="form-select">
									<?php for ($i = 1; $i <= 12; $i++) : ?>
										<option value="<?= $i ?>"><?= bulan($i) ?></option>
									<?php endfor; ?>
								</select>
							</div>
							<div class="col-6 col-md-5">
								<select name="tahun" class="form-select">
									<?php for ($i = date('Y') - 5; $i <= date('Y'); $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
							<div class="col-12 col-md-2">
								<button type="submit" class="btn btn-primary w-100">
									<ion-icon name="print-outline"></ion-icon> Cetak
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="pembayaran" class="table table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Dojang</th>
							<th>Atlet</th>
							<th>Nominal</th>
							<th>Sisa Pembayaran</th>
							<th>Jumlah Pembayaran</th>
							<th>Bukti Bayar</th>
							<th>Metode Pembayaran</th>
							<th>Nominal Pembayaran</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Masukkan DataTables JS di sini -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function () {
		var dataTable = $('#pembayaran').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo base_url('laporan/get_pembayaran_json'); ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [0, 1, 2, 3, 4, 5, 6, 7 , 8 , 9],
				"orderable": false,
			}],
		});
	});
</script>

<?php $this->load->view('components/footer') ?>
