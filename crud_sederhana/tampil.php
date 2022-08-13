<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Data</a>
    <?php
    include 'koneksi.php';
    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    ?>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Tanggal Lahir</th>
            <th>Menu</th>
        </tr>
    <?php
    $no = 1;
    foreach ($mahasiswa as $value) {
        ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$value['nim']?></td>
            <td><?=$value['nama']?></td>
            <td><?=$value['email']?></td>
            <td><?=$value['telp']?></td>
            <td><?=$value['tanggal_lahir']?></td>
            <td>
                <a href="tambah.php?id=<?=$value['id']?>">Edit</a>
                <a href="simpan.php?id=<?=$value['id']?>">Hapus</a>
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </table>    
</body>
</html>