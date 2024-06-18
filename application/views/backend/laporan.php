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
		<div class="row gx-4 gx-md-4 g-4 pt-3">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-info text-white">
					<div class="card-body">
						<h3 class="card-title">

						</h3>
						<p class="card-text">Atlet</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('laporan/atlet') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-success text-white">
					<div class="card-body">
						<h3 class="card-title"></h3>
						<p class="card-text">Dojang</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('dojang') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-warning text-white">
					<div class="card-body">
						<h3 class="card-title">

						</h3>
						<p class="card-text">Pembayaran</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('laporan/pembayaran') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-danger text-white">
					<div class="card-body">
						<h3 class="card-title">

						</h3>
						<p class="card-text">Laporan</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('users') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
		</div>
	</div>
</div>




<?php $this->load->view('components/footer') ?>
