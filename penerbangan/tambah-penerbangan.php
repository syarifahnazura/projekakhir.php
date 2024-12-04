<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data penerbangan</title>
</head>
<body>
<h3>Tambah jadwal penerbangan</h3>
    <form action="proses-tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Kota Asal</td>
                <td><input type="text" name="kota_asal" required></td>
            </tr>
            <tr>
                <td>Kota Tujuan</td>
                <td><input type="text" name="kota_tujuan" required></td>
            </tr>
            <tr>
                <td>Jam Keberangkatan</td>
                <td><input type="time" name="jam_keberangkatan"></td>
            </tr>
        </table> 
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>