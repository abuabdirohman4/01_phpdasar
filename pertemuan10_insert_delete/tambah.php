<?php
// koneksi ke DMBS
$conn = mysqli_connect("localhost", "root", "root", "fnd_01_php_dasar");

// cek apakah tombol submit dari tiap elemen dalam form
if (isset($_POST['submit']) ) {
    // var_dump($_POST);
	// ambil data dari tiap elemen dalam form
    $nama = $_POST["nama"];
	$nrp = $_POST["nrp"];
	$email = $_POST["email"];
	$jurusan = $_POST["jurusan"];
	$gambar = $_POST["gambar"];

    // query insert data
    $query = "INSERT INTO mahasiswa 
                VALUES 
                (NULL, '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    // var_dump(mysqli_affected_rows($conn));
    if ( mysqli_affected_rows($conn) > 0) {
        echo "Berhasil";
    } else {
        echo "Gagal";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp">
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