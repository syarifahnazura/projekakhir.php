<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Periksa apakah ID penumpang ada dalam URL
if (isset($_GET['penumpang_id'])) {
    // Mengambil id penumpang dari parameter URL
    $id = $_GET['penumpang_id'];

    // Mengambil data penumpang dari database berdasarkan id
    $query = $db->query("SELECT * FROM penumpang WHERE penumpang_id = '$id'");
    // Cek apakah data ditemukan
    if ($query->num_rows > 0) {
        $penumpang = $query->fetch_assoc();
    } else {
        die("Data penumpang tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan dalam URL.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Penumpang</title>
</head>
<body>
    <h3>Edit penumpang</h3>
    <form action="proses-edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="penumpang_id" value="<?php echo $penumpang['penumpang_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama" 
                    value="<?php echo $penumpang['nama']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" 
                    value="<?php echo $penumpang['email']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
