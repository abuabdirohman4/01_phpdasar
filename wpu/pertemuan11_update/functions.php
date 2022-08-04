<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "root", "fnd_01_php_dasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // var_dump('conn', $conn);

    $nama = htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa 
                VALUES 
                (NULL, '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";

    var_dump('$query', $query);

    mysqli_query($conn, $query);
    var_dump('mysqli_query', mysqli_query($conn, $query));

    var_dump('affected row', mysqli_affected_rows($conn));
    
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    // var_dump('conn', $conn);
    // var_dump('data', $data, '<br>');
    // var_dump('data', $data['nama'], '<br>');

    $id = $data["id"];
    // var_dump($id);
    $nama = htmlspecialchars($data["nama"]);
    // var_dump($nama);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

    // var_dump('nama', $nama, '<br>');

    $query = "UPDATE mahasiswa SET
                    nrp = '$nrp',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                WHERE id = '$id'
            ";
    // $query = "DELETE FROM mahasiswa WHERE id = 11";
    // $query = "UPDATE mahasiswa SET nama = '$nama' WHERE id = '$id'";
    // var_dump('$query', $query, '<br>');

    mysqli_query($conn, $query);
    // var_dump('mysqli_query', mysqli_query($conn, $query), '<br>');

    
    // var_dump('affected row', mysqli_affected_rows($conn), '<br>');
    return mysqli_affected_rows($conn);
}

?>