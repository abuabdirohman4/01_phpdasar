<?php
    require 'function.php';
    // $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
    $mahasiswa = query("SELECT * FROM mahasiswa");

    // Tombol Cari Ditekan
    if( isset($_POST['cari'])) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Masukkan keyword pencarian.." autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="">ubah</a>|<a href="">hapus</a>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </table>
</body>
</html>