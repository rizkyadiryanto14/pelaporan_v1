<!-- App Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
	<div class="offcanvas-body">
		<!-- profile box -->
		<div class="profileBox">
			<div class="image-wrapper">
				<img src="<?= base_url() ?>assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
			</div>
			<div class="in">
				<strong>Admin</strong>
				<div class="text-muted">
					<ion-icon name="location"></ion-icon>
					Sumbawa
				</div>
			</div>
			<a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
				<ion-icon name="close"></ion-icon>
			</a>
		</div>
		<!-- * profile box -->

		<ul class="listview flush transparent no-line image-listview mt-2">
			<li>
				<a href="<?= base_url('pembayaran') ?>" class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="cash-outline"></ion-icon>
					</div>
					<div class="in">
						<div>Pembayaran</div>
					</div>
				</a>
			</li>
			<li>
				<a href="<?= base_url('users') ?>" class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="people-outline"></ion-icon>
					</div>
					<div class="in">
						<div>Users</div>
					</div>
				</a>
			</li>
			<li>
				<a href="<?= base_url('pelatih') ?>" class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="accessibility-outline"></ion-icon>
					</div>
					<div class="in">
						<div>Pelatih</div>
					</div>
				</a>
			</li>
			<li>
				<div class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="moon-outline"></ion-icon>
					</div>
					<div class="in">
						<div>Dark Mode</div>
						<div class="form-check form-switch">
							<input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
							<label class="form-check-label" for="darkmodesidebar"></label>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- sidebar buttons -->
	<div class="sidebar-buttons">
		<a href="#" class="button">
			<ion-icon name="person-outline"></ion-icon>
		</a>
		<a href="#" class="button">
			<ion-icon name="settings-outline"></ion-icon>
		</a>
		<a href="<?= base_url('logout') ?>" class="button">
			<ion-icon name="log-out-outline"></ion-icon>
		</a>
	</div>
	<!-- * sidebar buttons -->
</div>
<!-- * App Sidebar -->
