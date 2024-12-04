<?php

session_start(); // mulai sesi
include("../koneksi.php");

// periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // ambil data dari form
    $penumpang_id = $_POST['penumpang_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

// buat query untuk memperbarui data penumpang
$sql = "UPDATE penumpang SET
    nama='$nama',
    email='$email'
    WHERE penumpang_id=$penumpang_id";

$query = mysqli_query($db, $sql);
// simpan pesan notifikasi dalas sesi berdasarkan hasil query
if ($query) {
    $_SESSION['notifikasi'] = "Data penumpang berhasil diperbarui!";
} else {
    $_SESSION['notifikasi'] = "Data penumpang gagal diperbarui!";
}
// alihkan ke halaman index.php
header('Location: index.php');
} else {
    // jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>