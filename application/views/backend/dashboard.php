<!--
File component terdapat di folder componets
-->

<!--File Header -->
<?php $this->load->view('components/header') ?>
<!--./File Header-->

<!--File Navbar-->
<?php $this->load->view('components/navbar') ?>
<!--./File Navbar-->

<!-- content -->
<div id="appCapsule">
	<div class="section">
		<div class="row gx-4 gx-md-4 g-4">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-info text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?php if (isset($total_atlet)){ ?>
								<?= $total_atlet ?>
							<?php } else { ?>
								0
							<?php } ?>
						</h3>
						<p class="card-text">Atlet</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('atlet') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-success text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?php if (isset($total_dojang)){ ?>
								<?= $total_dojang ?>
							<?php } else { ?>
								0
							<?php } ?>
						</h3>
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
							<?php if (isset($total_pelatih)){ ?>
								<?= $total_pelatih ?>
							<?php } else { ?>
								0
							<?php } ?>
						</h3>
						<p class="card-text">Pelatih</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('pelatih') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-danger text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?php if (isset($total_user)){ ?>
								<?= $total_user ?>
							<?php } else { ?>
								0
							<?php } ?>
						</h3>
						<p class="card-text">User</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('users') ?>" class="btn btn-sm btn-outline-light">More info <ion-icon name="arrow-forward-circle-outline"></ion-icon></a>
					</div>
				</div>
			</div>
			<!-- ./col -->
		</div>
	</div>

	<div class="section mt-3">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
					<h3 class="card-title fs-3">Jadwal Terbaru</h3>
						<div class="row">
							<?php
							if (!empty($data_jadwal)) {
								foreach ($data_jadwal as $item) { ?>
									<div class="col-md-12 mt-2">
										<div class="card shadow-lg">
											<div class="card-body">
												<div class="form-group">
													<h4><?= longdate_indo($item->tanggal) ?></h4>
													<h6>Bertempat di <?= $item->tempat?></h6>
												</div>
											</div>
										</div>
									</div>
								<?php }
							} else { ?>
								<div class="col-md-12">
									<div class="card shadow-lg">
										<div class="card-body">
											<div class="form-group">
												<h4>Belum Ada Jadwal</h4>
												<h6>Belum Adal Alamat</h6>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ./content -->

<!--File Button Navigation-->
<?php $this->load->view('components/button_navigation') ?>
<!--./File Button Navigation-->

<!--File sidebar-->
<?php $this->load->view('components/sidebar') ?>
<!--./File sidebar-->


<!--File Footer-->
<?php $this->load->view('components/footer') ?>
<!--./File Footer-->
