<?php

session_start(); //mulai sesi
// menghuungkan file ini dengan file konfigurasi database
include("../koneksi.php");

// mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])){
    /* mengambil nilai dari form input
    dan meyimpannya ke dalam variabel */
    $kota_asal = $_POST['kota_asal'];
    $kota_tujuan = $_POST['kota_tujuan'];
    $jam_keberangkatan = $_POST['jam_keberangkatan'];

    /* menyusun query SQL untuk menambah data
    ke table'penerbangan' */
    $sql ="INSERT INTO penerbangan 
        (kota_asal, kota_tujuan, jam_keberangkatan) 
        VALUES ('$kota_asal','$kota_tujuan','$jam_keberangkatan')";

        // menjalankan query dan menyimpan hasilnya dalam variabel $query
        $query = mysqli_query($db, $sql);

        // simpan pesan di sesi
        if ($query) {
            $_SESSION['notifikasi'] = "Data penerbangan berhasil ditambahkan!";
        } else {
            $_SESSION['notifikasi'] = "Data penerbangan gagal ditambahkan!";
        }
        // alihkan ke halaman index.php
        header('Location: index.php');
    } else {
        // jika akses langsung tanpa form, tampilkan pesan error
        die("Akses ditolaak...");
    }
    ?>
    