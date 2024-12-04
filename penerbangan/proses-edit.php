<?php

session_start(); // mulai sesi
include("../koneksi.php");

// periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {
    // ambil data dari form
    $penerbangan_id = $_POST['penerbangan_id'];
    $kota_asal = $_POST['kota_asal'];
    $kota_tujuan = $_POST['kota_tujuan'];
    $jam_keberangkatan = $_POST['jam_keberangkatan'];

// buat query untuk memperbarui data penerbangan
$sql = "UPDATE penerbangan SET
    kota_asal='$kota_asal',
    kota_tujuan='$kota_tujuan',
    jam_keberangkatan='$jam_keberangkatan'
    WHERE penerbangan_id=$penerbangan_id";

$query = mysqli_query($db, $sql);
// simpan pesan notifikasi dalas sesi berdasarkan hasil query
if ($query) {
    $_SESSION['notifikasi'] = "Data penerbangan berhasil diperbarui!";
} else {
    $_SESSION['notifikasi'] = "Data penerbangan gagal diperbarui!";
}
// alihkan ke halaman index.php
header('Location: index.php');
} else {
    // jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>