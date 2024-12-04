<?php

session_start(); //mulai sesi
// menghuungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
    /* mengambil nilai dari form input
    dan meyimpannya ke dalam variabel */
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    /* menyusun query SQL untuk menambah data
    ke table'penerbangan' */
    $sql = "INSERT INTO penumpang (nama, email) VALUES ('$nama', '$email')";
        // menjalankan query dan menyimpan hasilnya dalam variabel $query
        $query = mysqli_query($db, $sql);

        // simpan pesan di sesi
        if ($query) {
            $_SESSION['notifikasi'] = "Data penumpang berhasil ditambahkan!";
        } else {
            $_SESSION['notifikasi'] = "Data penumpang gagal ditambahkan!";
        }
        // alihkan ke halaman index.php
        header('Location: index.php');
    } else {
        // jika akses langsung tanpa form, tampilkan pesan error
        die("Akses ditolaak...");
    }
    ?>