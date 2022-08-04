<?php 
    session_start();
    
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    include 'functions.php';

    // Pagination
        // $jumlahDataPerHalaman = 2;
        // $jumlahData = count(query("SELECT * FROM mahasiswa"));
        // $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

        // $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        // $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

        $mahasiswa = query("SELECT * FROM mahasiswa");

    // tombol cari ditekan
    if (isset($_POST['cari'])) {
        $mahasiswa = cari($_POST['keyword']);
    }
?>

<html>
    <head>
        <title>Halaman Admin</title>
        <script src="js/jquery-3.6.0.min.js"></script>
        <!-- <script src="js/script.js"></script> -->
        <script src="js/script.js" defer></script>
        <style>
            ul {
                float: right;
            }
            ul li {
                display: inline;
                margin-right: 1rem;
            }
            .loader {
                width: 100px;
                position: absolute;
                top: 5rem;
                left: 17rem;
                z-index: -1;
                display: none;
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
            <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari" id="tombolCari" hidden="hidden">Cari</button>
            <img src="img/loader.gif" class="loader">
        </form>
        
        <!-- Navigasi -->
            <?php // if ($halamanAktif > 1) : ?>
                <!-- <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a>  -->
            <?php // endif; ?>

            <?php // for($i = 1; $i <= $jumlahHalaman; $i++):?>
                <?php // if($i == $halamanAktif):?>
                    <!-- <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red" > <?= $i ?> </a> -->
                <?php // else : ?>
                    <!-- <a href="?halaman=<?= $i; ?>"><?= $i ?></a> -->
                <?php // endif; ?>
            <?php // endfor;?>

            <?php // if ($halamanAktif < $jumlahHalaman) : ?>
                <!-- <a href="?halaman=<?= $halamanAktif + 1?>">&laquo;</a> -->
            <?php // endif; ?>

        <!-- <br><br> -->
        <div id="container">
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
        </div>
    </body>
</html>