<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Data</title>
</head>

<body>
	<h1>Edit Data</h1>
	<form method="POST" action="update.php" enctype="multipart/form-data">
		<input type="hidden" name="id"
			value="<?php echo $data['id']; ?>">
		<label>Nama:</label>
		<input type="text" name="name"
			value="<?php echo $data['name']; ?>"
			required>
		<br><br>
		<label>Email:</label>
		<input type="email" name="email"
			value="<?php echo $data['email']; ?>"
			required>
		<br><br>
		<label>Telepon:</label>
		<input type="text" name="phone"
		value="<?php echo $data['phone']; ?>"
		required>
		<br><br>
		<label>Foto:</label>
		<input type="file" name="photo" required>
		<br><br>
		<button type="submit">Update</button>
	</form>
</body>

</html>