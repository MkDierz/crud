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
			<th>NO</th>
			<th>ID</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
		<?php
        include 'koneksi.php';
		$no = 1;
		$query = mysqli_query($koneksi, "SELECT * FROM users");
		while ($data = mysqli_fetch_array($query)) {
		    ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['email']; ?>
			</td>
			<td><?php echo $data['phone']; ?>
			<td><img src="/uploads/<?php echo $data['photo']; ?>" alt="">
			</td>
			<td>
				<!-- parameter di awali tanda tanya -->
				<a
					href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
				<a
					href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
			</td>
		</tr>
		<?php
        $no++;
		} ?>
	</table>
</body>

</html>