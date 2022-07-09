<?php
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

    $nama = htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// $gambar = htmlspecialchars($data["gambar"]);
    // Upload Gambar
    $gambar = upload();
    if ( !$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa 
                VALUES 
                (NULL, '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu!');
            </script>
        ";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    // $ekstensiGambar = end($ekstensiGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo"
            <script>
                alert('Yang anda upload bukan gambar!');
            </script>
        ";
        return false;
    }

    // Cek ukuran gambar
    if ( $ukuranFile > 10000000) {
        echo"
        <script>
            alert('Ukuran gambar terlalu besar!');
        </script>
        ";
        return false;
    }

    // Lolos pengecekan, gambar siap diupload
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru); die;

    // move_uploaded_file($tmpName, 'img/' . $namaFile);
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // return $namaFile;
    return $namaFileBaru;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
    $gambaLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
	$gambar = htmlspecialchars($data["gambar"]);
    if ( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambaLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = '$id'
            ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    global $conn;

    $query = "SELECT * FROM mahasiswa 
                WHERE 
                -- nama = '%$keyword%'
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
            ";

    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek usernmae suda ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo 
        "<script>
            alert('Username sudah terdaftar');
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo
        "<script>
            alert('Konfirmasi password tidak berhasil!');
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);

}
?>