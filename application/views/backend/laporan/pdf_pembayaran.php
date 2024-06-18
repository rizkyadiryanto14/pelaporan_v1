<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	<style>
		/* Styling tabel untuk tampilan PDF */
		table {
			width: 100%;
			border-collapse: collapse;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
<h2>Laporan Pembayaran</h2>

<table id="atlet" class="table table-striped">
	<thead>
	<tr class="text-center">
		<th>No</th>
		<th>Dojang</th>
		<th>Atlet</th>
		<th>Nominal Iuran</th>
		<th>Nominal Pembayaran</th>
		<th>Sisa</th>
		<th>Pembayaran Ke-</th>
		<th>Tanggal</th>
		<th>Bukti</th>
	</tr>
	</thead>
	<tbody>
	<?php if (empty($pembayaran)) : ?>
		<tr>
			<td colspan="9" class="text-center">Tidak ada data</td>
		</tr>
	<?php else : ?>
		<?php
		$no = 1;
		foreach ($pembayaran as $item) :
			?>
			<tr class="text-center">
				<td><?= $no++ ?></td>
				<td><?= $item->nama_dojang ?></td>
				<td><?= $item->nama_atlet ?></td>
				<td><?= $item->nominal ?></td>
				<td><?= $item->nominal_pembayaran ?></td>
				<td><?= $item->sisa ?></td>
				<td><?= $item->jumlah_pembayaran ?></td>
				<td><?= longdate_indo($item->tgl_bayar) ?></td>
				<td>
					<?php if ($item->bukti_bayar) : ?>
						<a href="<?= base_url('uploads/bukti_bayar/' . $item->bukti_bayar) ?>">Lihat Bukti</a>
					<?php else : ?>
						-
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>
</body>
</html>
