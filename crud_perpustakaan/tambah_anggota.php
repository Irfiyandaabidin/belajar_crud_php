<?php include "header.php"; ?>

<?php
if (@$_GET['id_anggota']) 
{
    $id_anggota = $_GET['id_anggota'];
    
    include "koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
    $anggota = mysqli_fetch_array($query);

}
?>

<div class="container">
    <div class="row">
        <form action="simpan.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="kode_anggota">Kode Anggota</label>
                    </td>
                    <td>
                        <input type="number" name="kode_anggota" id="kode_anggota" value="<?=@$anggota['kode_anggota']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama">Nama Anggota</label>
                    </td>
                    <td>
                        <input type="text" name="nama" id="nama" value="<?=@$anggota['nama']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?=@$anggota['email']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telp">Telpon</label>
                    </td>
                    <td>
                        <input type="number" name="telp" id="telp" value="<?=@$anggota['telp']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="alamat">Alamat</label>
                    </td>
                    <td>
                        <input type="text" name="alamat" id="alamat" value="<?=@$anggota['alamat']?>">
                    </td>
                </tr>
                <input type="hidden" value="<?=@$anggota['id_anggota']?>">
            </table>
            <br>
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin_L" value="L">
            <label for="jenis_kelamin_L"> Laki-laki</label>
            <input type="radio" name="jenis_kelamin" id="jenis_kelamin_P" value="P">
            <label for="jenis_kelamin_P">Perempuan</label>
            <br>
            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto">
            <br>
            <br>
            <button type="submit">Simpan</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>