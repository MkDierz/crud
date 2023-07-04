<!DOCTYPE html>
<html>

<head>
	<title>Tambah Data</title>
</head>

<body>
	<h1>Tambah Data</h1>
	<form method="POST" action="simpan.php">
		<label>Nama:</label>
		<input type="text" name="name" required>
		<br><br>
		<label>Email:</label>
		<input type="email" name="email" required>
		<br><br>
		<label>Telepon:</label>
		<input type="text" name="phone" required>
		<br><br>
		<button type="submit">Simpan</button>
	</form>
</body>

</html>