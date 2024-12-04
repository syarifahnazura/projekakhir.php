<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data penumpang</title>
</head>
<body>
<h3>Tambah data penumpang</h3>
    <form action="proses-tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama Penumpang</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
        </table> 
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>