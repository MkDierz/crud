<?php

include 'koneksi.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = mysqli_query($koneksi, "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')");

if ($query) {
    header('Location: index.php');
} else {
    echo "Gagal menyimpan data";
}
