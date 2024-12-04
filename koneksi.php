<?php
//menentukan nama host, biasanya "localhost"
$server = "localhost";
//nama pengguna MySQL (default: root)
$user ="root";
//kata sandi untuk penggunak MySQL (default: kosong untuk root)
$password = "";
//nama basis data yang akan dihubungkan
$nama_database = "airline_reservation";

//mencoba untuk membuat koneksi ke basis data 
$db = mysqli_connect($server, $user, $password, $nama_database);

//memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>