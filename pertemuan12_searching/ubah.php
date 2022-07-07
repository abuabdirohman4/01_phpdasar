<?php
include 'functions.php';

// Ambil data di URL
$id = $_GET['id'];

// Query data mahasiswa berdasarkan id
// $mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// var_dump($mhs);
// var_dump($mhs[0]);
// var_dump($mhs[0]['nama']);

// Cek apakah tombol submit dari tiap elemen dalam form
if (isset($_POST['submit']) ) {
    // Cek apakah berhasil diubah atau tidak
    if (ubah($_POST) > 0 ) {
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal diubah');
                    document.location.href = 'ubah.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<head>
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <form action="" method="post">
        <input type="text" name="id" value="<?= $mhs['id'] ?>">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" value="<?= $mhs['nrp'] ?>" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" value="<?= $mhs['nama'] ?>" id="nama">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" value="<?= $mhs['email'] ?>" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" value="<?= $mhs['jurusan'] ?>" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" value="<?= $mhs['gambar'] ?>" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>