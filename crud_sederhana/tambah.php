<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>
        Tambah Data Mahasiswa
    </h1>
    <?php
    

    if (@$_GET['id'])
    {
        $id = $_GET['id'];
        
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'") or die("Error");
        $mahasiswa = mysqli_fetch_array($query);
    }
    ?>
    
    <form action="simpan.php" method="POST">
        <table>
            <tr>
                <td>NIM</td>
                <td>: <input type="text" name="nim" value="<?=@$mahasiswa['nim']?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" value="<?=@$mahasiswa['nama']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <input type="text" name="email" value="<?=@$mahasiswa['email']?>"></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td>: <input type="text" name="telp" value="<?=@$mahasiswa['telp']?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <input type="date" name="tanggal_lahir" value="<?=@$mahasiswa['tanggal_lahir']?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?=@$mahasiswa['id']?>">
                </td>
                <td>
                    <button type="submit">Simpan</button>
                </td>
            </tr>

        </table>
    </form>
</body>
</html>