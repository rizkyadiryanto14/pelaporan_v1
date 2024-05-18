<div class="modal fade" id="modallogout" data-bs-backdrop="static" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<b>Konfirmasi</b>
			</div>
			<form action="<?= base_url('logout') ?>" method="post">
				<div class="modal-body">
					<section>
						Klik Logout Untuk Keluar Dari Sistem
					</section>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-danger" type="submit">Logout</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- ============== Js Files ==============  -->
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/js/lib/bootstrap.min.js"></script>
<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- Splide -->
<script src="<?= base_url() ?>assets/js/plugins/splide/splide.min.js"></script>
<!-- ProgressBar js -->
<script src="<?= base_url() ?>assets/js/plugins/progressbar-js/progressbar.min.js"></script>
<!-- Base Js File -->
<script src="<?= base_url() ?>assets/js/base.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('sukses')) : ?>
	<script>
		Swal.fire({
			title: 'Succes!',
			text: '<?php echo $this->session->flashdata('sukses'); ?>',
			icon: 'success',
			confirmButtonText: 'OK'
		});
	</script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal')) : ?>
	<script>
		Swal.fire({
			title: 'Wrong !',
			text: '<?php echo $this->session->flashdata('gagal'); ?>',
			icon: 'error',
			confirmButtonText: 'OK'
		});
	</script>
<?php endif; ?>


</body>

</html>