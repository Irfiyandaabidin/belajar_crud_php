<?php
include "view/header.php";
include "config/config.php";
?>
<style>
    .tombol:hover {
        background-color:#852A99 !important;
        color: #fff
    }
    .banner {
        background-image:linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,55)), url(image/perpustakaan.jpg);
    }
    
</style>

<header>
    <div class="container text-center py-5 banner">
        <h1 class=" display-1" style="color:#852A99"><b>Mata Kuliah</b></h1>
        <p class="lead" style="color:#852A99">Informasi Mata Kuliah D3 Teknik Informatika</p>
    </div>
</header>


<div class="container">
    <div class="row mb-5 justify-content-evenly">
        <div class="col-12 col-lg-8 px-4 mt-2 shadow" style="border-radius:10px; border-top:#EF9A54 solid 10px; border-bottom:#EF9A54 solid 10px">
            <?php
            if(@$_GET['tambah'] == 'sukses') {
                $pesan = "Anda berhasil menambahkan Mata kuliah..";
                $color = "success";
            }
            elseif(@$_GET['update'] == 'sukses') {
                $pesan = "Anda berhasil Update Matakuliah";
                $color = "primary";
            }
            elseif(@$_GET['hapus'] == 'sukses') {
                $pesan = "Anda berhasil menghapus beban hidup";
                $color = "danger";
            }
            else{
                $pesan = "";
            }
            

            if($pesan != ''){
                ?>
                <div class="alert alert-<?=$color?> alert-dismissible fade show mt-2" role="alert">
                    <?=$pesan?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            <?php
            }
            ?>

            <p class=" pt-4">Mata kuliah dalam jurusan teknik informatika akan fokus pada pemrograman, teknologi jaringan komputer, dan pengembangan perangkat lunak. Mata kuliah itu di antaranya sistem informasi, logika informatika, strategi algoritma, rekayasa perangkat lunak, Artificial Intelligence (AI), dan pemrograman Internet.</p>
            <?php
            $matkul = mysqli_query($koneksi, "SELECT * FROM mata_kuliah");
            ?>
            <a href="formMatkul.php" class="tombol btn my-3" style="text-align: right; background-color:#EF9A54">Tambah Mata Kuliah</a>
            <div class="message"></div>
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-5">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Mata Kuliah</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Option</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($matkul as $value) {
                        ?>
                    <tr>
                            <td><?= $no ?></td>
                            <td><?= $value['kode'] ?></a></td>
                            <td><a style="text-decoration:none; color:#852A99" href="tampilMatkul.php?kode=<?=$value['kode']?>"><?= $value['nama_matkul'] ?></td>
                            <td><?= $value['deskripsi'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="formMatkul.php?kode=<?=$value['kode']?>" class="btn btn-success">Edit</a>
                                    <a href="controller/controllerMatkul.php?kode=<?=$value['kode']?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </td>
                            
                        <?php
                        $no += 1;
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-3 mt-2 pb-4 shadow-sm" style="border-radius:10px; border-top:#852a99 solid 10px; border-bottom:#852a99 solid 10px">
            <p class=" pt-4" style="margin-bottom:10px">Support By: </p>
            <hr style="width:75%; color:#EF9A54; border-width:5px; border-radius:10px; margin-top:0">
            <img class="mx-3" src="image/Logo Indomie.png" style="widht:90; height:90; border-radius:10px" alt="">
            <img src="image/Amikom.png" style="widht:90; height:90; border-radius:10px" alt="">
        </div>
    </div>
</div>

<?php
include "view/footer.php"
?>