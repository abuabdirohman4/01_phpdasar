<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "root", "fnd_01_php_dasar");

// ambil data dari tabel mahasiswa / query data dari mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// echo $result;
// var_dump($result);
// if (!$result) {
//     echo mysqli_error($conn);
// }

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row(); // mengembalikan array numerik
// mysqli_fetch_assoc(); // mengembalikan array associative
// mysqli_fetch_array(); // mengembalikan keduanya (numerik & associative)
// mysqli_fetch_object(); // mengebambalikan dalam bentuk object & cara panggilnya dengan ->

// $mhs = mysqli_fetch_row($result);;
// $mhs = mysqli_fetch_assoc($result);;
// $mhs = mysqli_fetch_array($result);;
// $mhs = mysqli_fetch_object($result);;
// var_dump($mhs);
// var_dump($mhs[2]);
// var_dump($mhs["jurusan"]);
// var_dump($mhs->jurusan);

// while ( $mhs = mysqli_fetch_assoc($result) ) {
//     // var_dump($mhs["nama"]);
//     var_dump($mhs);
// }

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
            
            <?php while( $row = mysqli_fetch_assoc($result)) :?>
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
            <?php endwhile; ?>
        </table>
    </body>
</html>