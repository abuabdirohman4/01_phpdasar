<?php
include 'functions.php';

// Ambil data di URL
$id = $_GET['id'];

// Query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs['gambar'] ?>">
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
                <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $mhs['gambar']; ?>" width="50" alt="<?= $mhs['gambar']; ?>"> <br>
                <input type="file" name="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>