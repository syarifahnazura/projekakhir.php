<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php"); 
session_start(); //mulai sesi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data penerbangan</title>
    <style>
    /* membuat styling pada table */
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px
    }
    </style>
</head>
<body>
<ul>
    <li><a href="index.php">Data Penerbangan</a></li>
    <li><a href="../penumpang/index.php">Data Penumpang</a></li>
</ul>
      <h2>Data Penerbangan</h2>
     <!-- tampilkan notifikasi jika ada -->
     <?php if (isset($_SESSION['notifikasi'])): ?>
        <P><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- hapus notifikasi setelah ditampilkan -->
         <?php unset($_SESSION['notifikasi']); ?>
         <?php endif; ?>
         <table> 
         <thead>
            <tr align="center">
                <th>#</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Jam Keberangkatan</th>
                <th><a href="tambah-penerbangan.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variabel untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM penerbangan");
        /* perulangan while akan terus berjalan (menampilkan data)
        selama kondisi $query bernilai true (adanya data pada
        table penerbangan) */
        while ($penerbangan = $query->fetch_assoc()){
        /* fungsi fetch_assoc digunakan untuk mengambil
        data perulangan dalam bentuk array */
        ?> <!-- kode PHP ditutup untuk menyisipkan Kode HTML
        yang akan di looping menggunakan while loop -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $penerbangan['kota_asal'] ?></td>
            <td><?php echo $penerbangan['kota_tujuan'] ?></td>
            <td><?php echo $penerbangan['jam_keberangkatan'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit data dengan menggunakan
                 parameter id pada kolom table -->  
                <a href="edit-penerbangan.php?penerbangan_id=<?php echo $penerbangan['penerbangan_id'] ?>">Edit</a>
                <!-- URL untuk menghapus data dengan menggunakan parameter id 
                pada kolom table dan alert konfirmasi hapus data -->
                <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                href="hapus-penerbangan.php?penerbangan_id=<?php echo $penerbangan['penerbangan_id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php
         } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
    </tbody> 
    </table>
    <!-- menghitung jumlah baris yang ada pada table (penerbangan) -->   
     <p>Total: <?php echo mysqli_num_rows($query) ?></p>   
</body>
</html>