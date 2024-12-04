<?php
session_start(); // Mulai sesi
include("../koneksi.php"); // Menghubungkan file koneksi

// Periksa apakah ada ID yang dikirim melalui URL
if (isset($_GET['penerbangan_id'])) {
    // Ambil ID dari URL
    $id = $_GET['penerbangan_id'];

    // Buat query untuk menghapus data penerbangan berdasarkan ID
    $sql = "DELETE FROM penerbangan WHERE penerbangan_id = $id"; // Perbaiki nama tabel dan gunakan variabel $id
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data penerbangan berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data penerbangan gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>