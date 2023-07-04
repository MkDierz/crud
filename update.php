<?php

include 'koneksi.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$id'");

if ($query) {
    header('Location: index.php');
} else {
    echo "Gagal mengupdate data";
}
