<?php
include "config/config.php";
include "view/header.php";

$pertemuan = mysqli_query($koneksi, "SELECT * FROM pertemuan 
                                    RIGHT JOIN mata_kuliah
                                    ON pertemuan.kode = mata_kuliah.kode
                                    WHERE pertemuan.kode");
?>


<style>
    .card:hover {
        border-radius:20px;
        border-left: 10px solid #842A98;
    }
    .tombol:hover {
        color: #fff;
        background-color: #842A98 !important;
    }
</style>

<header>
    <div class="container banner text-center text-light py-5" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(image/kelas.jpg)">
        <h1 class="display-1" style="color:#852A99"><b>Materi Perkuliahan</b></h1>
        <p class="lead" style="color:#852A99">Materi setiap minggunya dari dosen</p>
    </div>
</header>

<div class="container mb-5">
    <div class="row mx-2 py-3 justify-content-center">
        <div class="col-12 shadow" style="border-radius:10px; border-top:#EF9A54 solid 10px; border-bottom:#EF9A54 solid 10px">
            <p class="pt-2">Berapa jumlah minggu belajar dalam satu semester kuliah?
                Satu semester setara dengan kegiatan belajar sekitar 16 (enam belas) minggu kerja, dan diakhiri oleh ujian akhir semester. Satu tahun akademik terdiri dari dua semester reguler, yaitu: Semester Gasal dan Semester Genap.
            </p>
            <a href="formPertemuan.php" class="tombol btn mb-3" style="background-color:#EF9A54">Tambah Pertemuan</a>
        </div>
    </div>
    <div class="row mx-2 shadow-sm" style="border-radius:10px; border-top:#852a99 solid 10px; border-bottom:#852a99 solid 10px">
        <p class="py-2">Overview..</p>
        <?php
        foreach ($pertemuan as $value){
        ?>
        <div class="col-6 col-lg-3 pb-3">
                <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?=$value['nama_matkul']?></h5>
                            <p class="card-text">Minggu ke-<?=$value['minggu']?></p>
                            <a href="tampilMateri.php?id=<?=$value['id']?>" class="btn btn-primary mb-1">Materi</a>
                            <a href="controller/controllerPertemuan.php?id=<?=$value['id']?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include "view/footer.php"
?>