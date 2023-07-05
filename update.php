<?php

include 'koneksi.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$dir = "uploads/";

$uploaded = move_uploaded_file($tmp_name, $dir.$photo);

if ($uploaded) {
    $query = mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email', phone='$phone', photo='$photo' WHERE id='$id'");
    if ($query) {
        header('Location: index.php');
    } else {
        echo "Gagal menyimpan data";
    }
} else {
    echo "Gagal menyimpan data";
}