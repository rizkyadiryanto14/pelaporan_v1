<?php $this->load->view('components/header') ?>

<!-- App Capsule -->
<div id="appCapsule" class="pt-0">

	<div class="login-form mt-1">
		<div class="section">
			<img src="<?= base_url('assets/img/logo.png') ?>" alt="image" class="form-image">
		</div>
		<div class="section mt-1">
			<h1>Aplikasi Dojang Taekwondo</h1>
			<h4>Masuk untuk mendapat akses ke sistem</h4>
		</div>
		<div class="section mt-1 mb-5">
			<form action="<?= base_url('auth/login') ?>" method="post">
				<div class="form-group boxed">
					<div class="input-wrapper">
						<input type="text" class="form-control" name="username" id="email1" placeholder="username" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
				</div>

				<div class="form-group boxed">
					<div class="input-wrapper">
						<input type="password" class="form-control" id="password1" placeholder="Password" name="password" autocomplete="off" required>
						<i class="clear-input">
							<ion-icon name="close-circle"></ion-icon>
						</i>
					</div>
				</div>
				<div class="form-button-group">
					<button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
				</div>
			</form>

			<div class="row">
				<div class="col-12 mx-auto mt-3 mb-3">
                    <span>
                        <p style="vertical-align: middle;" class="text-muted text-center">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> -Dojangtaekwondo. All rights reserved.
                        </p>
                    </span>
				</div>
			</div>

		</div>
	</div>

</div>
<!-- * App Capsule -->

<?php $this->load->view('components/footer') ?>
