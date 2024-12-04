<?php
// menghubungkan file koneksi dengan index
include("../koneksi.php"); 
session_start(); //mulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data penumpang</title>
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
    <li><a href="../penerbangan/index.php">Data Penerbangan</a></li>
    <li><a href="index.php">Data Penumpang</a></li>
</ul>
      <h2>Data Penumpang</h2>
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
                <th>Nama Penumpang</th>
                <th>Email</th>
                <th><a href="tambah-penumpang.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // membuat variabel untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM penumpang");
        /* perulangan while akan terus berjalan (menampilkan data)
        selama kondisi $query bernilai true (adanya data pada
        table penerbangan) */
        while ($penumpang = $query->fetch_assoc()){
        /* fungsi fetch_assoc digunakan untuk mengambil
        data perulangan dalam bentuk array */
        ?> <!-- kode PHP ditutup untuk menyisipkan Kode HTML
        yang akan di looping menggunakan while loop -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $penumpang['nama'] ?></td>
            <td><?php echo $penumpang['email'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit data dengan menggunakan
                 parameter id pada kolom table -->  
                <a href="edit-penumpang.php?penumpang_id=<?php echo $penumpang['penumpang_id'] ?>">Edit
                <!-- URL untuk menghapus data dengan menggunakan parameter id 
                pada kolom table dan alert konfirmasi hapus data -->
                <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                href="hapus-penumpang.php?penumpang_id=<?php echo $penumpang['penumpang_id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php
        } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
    </tbody> 
    </table>
    <!-- menghitung jumlah baris yang ada pada table (penumpang) -->   
     <p>Total: <?php echo mysqli_num_rows($query) ?></p>   
 </body>
</body>
</html>