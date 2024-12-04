<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Periksa apakah ID ada dalam URL
if (isset($_GET['penerbangan_id'])) {
    // Mengambil id penerbangan dari parameter URL
    $id = $_GET['penerbangan_id'];

    // Mengambil data penerbangan dari database berdasarkan id
    $query = $db->query("SELECT * FROM penerbangan WHERE penerbangan_id = '$id'");
    // Cek apakah data ditemukan
    if ($query->num_rows > 0) {
        $penerbangan = $query->fetch_assoc();
    } else {
        die("Data penerbangan tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan dalam URL.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data penerbangan</title>
</head>
<body>
    <h3>Edit Jadwal Penerbangan</h3>
    <form action="proses-edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="penerbangan_id" value="<?php echo $penerbangan['penerbangan_id']; ?>">
        <table border="0">
            <tr>
                <td>Kota Asal</td>
                <td>
                    <input type="text" name="kota_asal" 
                    value="<?php echo $penerbangan['kota_asal']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Kota Tujuan</td>
                <td>
                    <input type="text" name="kota_tujuan" 
                    value="<?php echo $penerbangan['kota_tujuan']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Jam Keberangkatan</td>
                <td>
                    <input type="time" name="jam_keberangkatan" 
                    value="<?php echo $penerbangan['jam_keberangkatan']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
