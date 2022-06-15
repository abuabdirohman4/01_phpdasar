<?php 
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");
?>

<html>
    <head>
        <title>Halaman Admin</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>

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
            
            <?php // while( $row = mysqli_fetch_assoc($result)) :?>
            <?php foreach( $mahasiswa as $row ) : ?>
            <!-- <tbody>
                <td>1</td>
                <td>
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/abuabdirohman.jpg" alt="" width="50"></td>
                <td>1301164354</td>
                <td>Abu Abdirohman</td>
                <td>abuabdirohman4@gmail.com</td>
                <td>Informatika</td>
            </tbody> -->
            <tbody>
                <td></td>
                <td>
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"] ?>" width="50"></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["jurusan"] ?></td>
            </tbody>
            <?php endforeach; ?>
            <?php // endwhile; ?>
        </table>
    </body>
</html>