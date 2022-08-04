<?php 
    include 'functions.php';
    // $mahasiswa = query("SELECT * FROM mahasiswa");
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
    // $mahasiswa = query("SELECT * FROM mahasiswa WHERE nrp = 123");

    // tombol cari ditekan
    if (isset($_POST['cari'])) {
        $mahasiswa = cari($_POST['keyword']);
    }
?>

<html>
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>
        <a href="tambah.php">Tambah Data Mahasiswa</a>
        <br><br>

        <form action="" method="post">

            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari</button>

        </form>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <td>No</td>
                <td>Aksi</td>
                <td>Gambar</td>
                <td>NIM</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Jurusan</td>
            </thead>
            
            <?php $i = 1 ?>
            <?php foreach( $mahasiswa as $row ) : ?>
            <tbody>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"] ?>" width="50"></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["jurusan"] ?></td>
            </tbody>
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>