# CRUD (Create, Read, Update, Delete) menggunakan PHP Native dan MySQL dalam pemrograman web.

## **Pendahuluan:**
Pada tutorial ini, kita akan belajar bagaimana membuat aplikasi CRUD sederhana menggunakan PHP Native dan MySQL. CRUD adalah operasi dasar dalam pengembangan web yang memungkinkan kita untuk membuat, membaca, memperbarui, dan menghapus data dalam database.

## **Persiapan:**
Sebelum memulai, pastikan Anda memiliki lingkungan pengembangan web yang terinstal, seperti XAMPP, yang menyediakan server web lokal dan database MySQL. Pastikan juga bahwa server web dan MySQL Anda sedang berjalan.

## **Langkah 1: Membuat Database:**

1. Buka PHPMyAdmin melalui browser dengan URL `http://localhost/phpmyadmin`.
2. Setelah masuk ke PHPMyAdmin, Anda akan melihat panel navigasi di sebelah kiri. Klik pada tab "Databases" (atau "Basis Data" dalam versi bahasa Indonesia).
3. Di bagian "Create database", berikan nama database yang diinginkan. Misalnya, beri nama "crud_example" dan klik tombol "Create" (atau "Buat" dalam versi bahasa Indonesia).
4. Database "crud_example" akan dibuat dan ditampilkan dalam panel navigasi di sebelah kiri.

## **Langkah 2: Membuat Tabel:**

1. Klik pada nama database yang baru Anda buat ("crud_example") di panel navigasi di sebelah kiri.
2. Di bagian atas tampilan, ada tab "SQL". Klik tab ini untuk membuka editor SQL.
3. Dalam editor SQL, Anda dapat menuliskan perintah-perintah SQL untuk membuat tabel.
4. Berikut adalah contoh perintah SQL untuk membuat tabel "users" dengan kolom-kolom yang sesuai:

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(50),
    phone VARCHAR(15)
);
```

Dalam perintah di atas, kita menggunakan perintah `CREATE TABLE` untuk membuat tabel "users" dalam database "crud_example". Tabel ini memiliki empat kolom:

- Kolom "id" dengan tipe data INT adalah kolom kunci utama (primary key) yang otomatis diincrement (AUTO_INCREMENT) setiap kali sebuah baris ditambahkan ke tabel.
- Kolom "name" dengan tipe data VARCHAR(50) adalah kolom untuk menyimpan nama pengguna dengan panjang maksimal 50 karakter.
- Kolom "email" dengan tipe data VARCHAR(50) adalah kolom untuk menyimpan alamat email pengguna dengan panjang maksimal 50 karakter.
- Kolom "phone" dengan tipe data VARCHAR(15) adalah kolom untuk menyimpan nomor telepon pengguna dengan panjang maksimal 15 karakter.

Anda dapat menyesuaikan perintah SQL di atas sesuai dengan kebutuhan Anda, seperti menambahkan kolom tambahan atau mengubah tipe data.

5. Setelah menuliskan perintah SQL di editor, klik tombol "Go" (atau "Jalankan" dalam versi bahasa Indonesia).
6. Tabel "users" akan dibuat dalam database "crud_example".

Dengan demikian, Anda telah berhasil membuat database dan tabel menggunakan SQL. Sekarang Anda dapat melanjutkan ke langkah-langkah berikutnya dalam tutorial untuk membangun aplikasi CRUD dengan PHP Native dan MySQL.

## **Langkah 2: Membuat Koneksi ke Database:**
1. Buat file baru dengan nama "koneksi.php" dan simpan di direktori proyek Anda.
2. Isi file "koneksi.php" dengan kode berikut:

```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "crud_example";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
```

- File ini digunakan untuk membuat koneksi ke database MySQL.
- `$host`, `$username`, `$password`, dan `$database` adalah variabel yang berisi informasi koneksi database, seperti nama host, username, password, dan nama database.
- Fungsi `mysqli_connect()` digunakan untuk menghubungkan ke server database.
- Jika koneksi gagal, fungsi `mysqli_connect_error()` akan menampilkan pesan error.

## **Langkah 3: Membuat Halaman Tampilan:**
1. Buat file baru dengan nama "index.php" dan simpan di direktori proyek Anda.
2. Isi file "index.php" dengan kode berikut:

```php
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
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['phone']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
```
- File ini adalah halaman utama yang menampilkan daftar data dari tabel "users".
- Tag `<table>` digunakan untuk membuat tabel.
- Bagian PHP `include 'koneksi.php';` digunakan untuk menghubungkan file "koneksi.php" agar koneksi database tersedia.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query SELECT untuk mendapatkan data dari tabel "users".
- Fungsi `mysqli_fetch_array()` digunakan untuk mengambil setiap baris hasil query sebagai array asosiatif.
- Data yang diambil kemudian ditampilkan dalam tabel menggunakan tag HTML.

## **Langkah 4: Membuat Halaman Tambah Data:**
1. Buat file baru dengan nama "tambah.php" dan simpan di direktori proyek Anda.
2. Isi file "tambah.php" dengan kode berikut:

```php
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
```
- File ini adalah halaman untuk menambahkan data baru ke tabel "users".
- Tag `<form>` digunakan untuk membuat form input.
- Atribut `method="POST"` menentukan bahwa data akan dikirim melalui metode POST.
- Atribut `action="simpan.php"` menentukan file yang akan dipanggil untuk menyimpan data.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query INSERT untuk menyimpan data baru ke tabel "users".

## **Langkah 5: Membuat Halaman Simpan Data:**
1. Buat file baru dengan nama "simpan.php" dan simpan di direktori proyek Anda.
2. Isi file "simpan.php" dengan kode berikut:

```php
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
?>
```

- File ini digunakan untuk menyimpan data yang diinputkan dari form "tambah.php" ke dalam tabel "users".
- Data yang diambil dari form disimpan dalam variabel `$name`, `$email`, dan `$phone`.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query INSERT untuk menyimpan data baru ke tabel "users".
- Jika query berhasil, pengguna akan diarahkan kembali ke halaman utama "index.php", jika tidak, akan ditampilkan pesan error.

## **Langkah 6: Membuat Halaman Edit Data:**
1. Buat file baru dengan nama "edit.php" dan simpan di direktori proyek Anda.
2. Isi file "edit.php" dengan kode berikut:

```php
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
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama:</label>
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
        <br><br>
        <label>Telepon:</label>
        <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required>
        <br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
```
- File ini adalah halaman untuk mengedit data yang ada di tabel "users".
- Variabel `$id` diambil dari parameter GET untuk menentukan data yang akan diedit.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query SELECT untuk mendapatkan data pengguna yang akan diubah.
- Data yang diambil dari query ditampilkan dalam form input.
- Ketika tombol "Update" ditekan, data yang diubah akan disimpan melalui file "update.php".

## **Langkah 7: Membuat Halaman Update Data:**
1. Buat file baru dengan nama "update.php" dan simpan di direktori proyek Anda.
2. Isi file "update.php" dengan kode berikut:

```php
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
?>
```
- File ini digunakan untuk mengupdate data yang diubah dari form "edit.php" ke dalam tabel "users".
- Variabel `$id`, `$name`, `$email`, dan `$phone` diambil dari form input.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query UPDATE untuk memperbarui data di tabel "users".
- Jika query berhasil, pengguna akan diarahkan kembali ke halaman utama "index.php", jika tidak, akan ditampilkan pesan error.


## **Langkah 8:**

 **Membuat Halaman Hapus Data:**
1. Buat file baru dengan nama "hapus.php" dan simpan di direktori proyek Anda.
2. Isi file "hapus.php" dengan kode berikut:

```php
<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");

if ($query) {
    header('Location: index.php');
} else {
    echo "Gagal menghapus data";
}
?>
```
- File ini digunakan untuk menghapus data dari tabel "users".
- Variabel `$id` diambil dari parameter GET untuk menentukan data yang akan dihapus.
- Fungsi `mysqli_query()` digunakan untuk mengeksekusi query DELETE untuk menghapus data dari tabel "users".
- Jika query berhasil, pengguna akan diarahkan kembali ke halaman utama "index.php", jika tidak, akan ditampilkan pesan error.