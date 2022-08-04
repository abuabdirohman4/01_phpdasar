<?php 
    session_start();
    
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    include 'functions.php';
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

            @media print {
                .print-hidden {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <ul>
            <li><a href="cetak.php" class="print-hidden" target="_blank">Cetak</a></li>
            <li><a href="logout.php" class="print-hidden">Logout</a></li>
        </ul>
        <h1>Daftar Mahasiswa</h1>

        <a href="tambah.php" class="print-hidden">Tambah Data Mahasiswa</a>
        <br class="print-hidden"><br class="print-hidden">

        <form action="" method="post" class="print-hidden">
            <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari" id="tombolCari" hidden="hidden">Cari</button>
            <img src="img/loader.gif" class="loader">
        </form>

        <div id="container">
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <td>No</td>
                    <td class="print-hidden">Aksi</td>
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