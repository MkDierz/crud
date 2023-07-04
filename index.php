<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi CRUD PHP Native</title>
</head>

<body>
	<h1>Aplikasi CRUD PHP Native</h1>
	<a href="tambah.php">Tambah Data</a>
	<br><br>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
		<?php
        include 'koneksi.php';
		$query = mysqli_query($koneksi, "SELECT * FROM users");
		while ($data = mysqli_fetch_array($query)) {
		    ?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['email']; ?>
			</td>
			<td><?php echo $data['phone']; ?>
			</td>
			<td>
				<a
					href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
				<a
					href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>

</html>