<?php

include 'koneksi.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$dir = "uploads/";

$uploaded = move_uploaded_file($tmp_name, $dir.$photo);

if ($uploaded) {
    $query = mysqli_query($koneksi, "INSERT INTO users (name, email, phone, photo) VALUES ('$name', '$email', '$phone', '$photo')");
    if ($query) {
        header('Location: index.php');
    } else {
        echo "Gagal menyimpan data";
    }
} else {
    echo "Gagal menyimpan data";
}


