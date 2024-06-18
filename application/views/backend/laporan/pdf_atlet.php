<!DOCTYPE html>
<html>
<head>
	<title>Data Atlet</title>
</head>
<body>
<h1>Data Atlet</h1>
<table>
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Atlet</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Tempat Lahir</th>
		<th>Email</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	foreach ($atlet as $row): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?php echo $row->nama_atlet; ?></td>
			<td><?php echo $row->jenis_kelamin; ?></td>
			<td><?php echo $row->tgl_lahir; ?></td>
			<td><?php echo $row->alamat; ?></td>
			<td><?php echo $row->tempat_lahir; ?></td>
			<td><?php echo $row->email; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>
