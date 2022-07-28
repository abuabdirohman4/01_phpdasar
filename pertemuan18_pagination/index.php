<?php 
    session_start();
    
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    include 'functions.php';

    // pagination
    // Konfigurasi
    $jumlahDataPerHalaman = 2;
    // $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // $jumlahData = mysqli_num_rows($result);
    // var_dump($jumlahData);
    
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    // var_dump($jumlahData);
    // $jumlahHalaman = round($jumlahData / $jumlahDataPerHalaman);
    // $jumlahHalaman = floor($jumlahData / $jumlahDataPerHalaman);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    // var_dump($jumlahHalaman);

    // if (isset($_GET["halaman"])) {
    //     $halamanAktif = $_GET["halaman"];
    // } else {
    //     $halamanAktif = 1;
    // }
    // Ternary
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    // var_dump($halamanAktif);

    // Jumlah Data Perhalaman 2
    // halaman aktif 2, awalData = 2
    // halaman aktif 3, awalData = 4
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;



    // $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id"); // default ASC
    // $mahasiswa = query("SELECT * FROM mahasiswa LIMIT 0, 2");
    // $mahasiswa = query("SELECT * FROM mahasiswa LIMIT 0, $jumlahDataPerHalaman");
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

    // tombol cari ditekan
    if (isset($_POST['cari'])) {
        $mahasiswa = cari($_POST['keyword']);
    }
?>

<html>
    <head>
        <title>Halaman Admin</title>
        <style>
            ul {
                float: right;
            }
            ul li {
                display: inline;
                margin-right: 1rem;
            }
        </style>
    </head>
    <body>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <h1>Daftar Mahasiswa</h1>

        <a href="tambah.php">Tambah Data Mahasiswa</a>
        <br><br>

        <form action="" method="post">

            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari">Cari</button>

        </form>

        
        <!-- Navigasi -->
        <?php if ($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a> 
            <!-- &lt; -->
        <?php endif; ?>

        <?php for($i = 1; $i <= $jumlahHalaman; $i++):?>
            <?php if($i == $halamanAktif):?>
                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red" > <?= $i ?> </a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor;?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1?>">&laquo;</a>
            <!-- &gt; -->
        <?php endif; ?>

        <br><br>
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