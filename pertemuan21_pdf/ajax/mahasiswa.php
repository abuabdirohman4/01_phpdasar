<?php
    // sleep(1);
    // usleep(500000);
    require '../functions.php';
    $keyword = $_GET['keyword'];
    // $query = "SELECT * FROM mahasiswa";
    $query = "SELECT * FROM mahasiswa 
                WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
             ";
    $mahasiswa = query($query);
    // var_dump($mahasiswa);
    // var_dump($keyword);
?>
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