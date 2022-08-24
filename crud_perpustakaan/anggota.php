<?php
include 'header.php'
?>
<div class="container">
    <div class="row">
            <h1 class="text-center">Data Anggota</h1>
        <a href="tambah_anggota.php"> Tambah Data Anggota </a>
        <a href="anggota.php"> Print </a>
        <?php

        // Untuk memunculkan alert ketika menambah, mengupdate, dan menghapus data
        if(@$_GET['tambah'] == "sukses") {
            $color = "success";
            $msg = 'Data Mahasiswa berhasil ditambah. ';
        }
        else if(@$_GET['update'] == "sukses") {
            $color = "info";
            $msg = "Data Mahasiswa berhasil diupdate. ";
        }
        else if (@$_GET['delete'] == "sukses") {
            $color = "danger";
            $msg = "Data Mahasiswa berhasil dihapus. ";
        }
        else{
            $color = "";
            $msg = "";
        }

        if($msg != ''){
            ?>
            <div class="alert alert-<?=$color?> alert-dismissible fade show" role="alert">
            <?=$msg?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            <?php
        }
        // end(alert)

        include 'koneksi.php';
        $anggota = mysqli_query($koneksi, "SELECT * FROM anggota") or die(mysqli_error($koneksi));
        ?>

        <table class="table table-primary table-striped">
            <tr>
                <th>No.</th>
                <th>Kode Anggota</th>
                <th>Foto</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Menu</th>
            </tr>
            <?php
            $no = 1;
            foreach ($anggota as $value) {
                $jenis_kelamin = ($value['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                $foto = ($value['foto'] == '') ? 'no-picture.jpg' : $value['foto'];
                ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$value['kode_anggota']?></td>
                    <td><img src="foto/<?=$foto?>" width="75"></td>
                    <td><?=$value['nama']?></td>
                    <td><?=$value['jenis_kelamin']?></td>
                    <td><?=$value['email']?></td>
                    <td><?=$value['telp']?></td>
                    <td><?=$value['alamat']?></td>
                    <td>
                        <a href="simpan.php?id_anggota=<?=$value['id_anggota']?>">Hapus</a>
                        <a href="tambah_anggota.php?id_anggota=<?=$value['id_anggota']?>">Edit</a>
                    </td>
                    <td>

                    </td>
                </tr>
               

            <?php
            $no++;
            }
            ?>
        </table>
    </div>
</div>
<?php
include 'footer.php'
?>