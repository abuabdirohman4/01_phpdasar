<?php
include 'functions.php';
// cek apakah tombol submit dari tiap elemen dalam form
if (isset($_POST['submit']) ) {
	// ambil data dari tiap elemen dalam form
    // $nama = $_POST["nama"];
	// $nrp = $_POST["nrp"];
	// $email = $_POST["email"];
	// $jurusan = $_POST["jurusan"];
	// $gambar = $_POST["gambar"];

    if (tambah($_POST) > 0 ) {
        echo "
                <script>
                    // alert('data berhasil ditambahkan!');
                    // document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'tambah.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <a href="index.php">Kembali</a>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>