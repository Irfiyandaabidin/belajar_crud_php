<?php
include "view/header.php";
include "config/config.php";

$kode = $_GET['kode'];
$query = mysqli_query($koneksi, "SELECT nama_matkul FROM mata_kuliah WHERE kode ='$kode'");
$display = mysqli_fetch_array($query)
?>

<header>
    <div class="container text-center py-5"  style="background-image:linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(image/buku.jpg); background-size: 100%;">
        <h1 class="display-2" style="color:#852A99"><b><?=$display['nama_matkul']?></b></h1>
        <p class="lead"  style="color:#852A99">Materi dari dosen terkait matakuliah yang bersangkutan ....</p>
    </div>
</header>

<div class="container mb-5">
    <div class="row justify-content-evenly">
        <div class="col-11 col-md-4 mt-2 shadow" style="border-radius:10px; border-top:#EF9A54 solid 10px; border-bottom:#EF9A54 solid 10px">
            <?php
            if(@$_GET['kode']) {
                $kode = $_GET['kode'];
                $query = mysqli_query($koneksi, "SELECT mata_kuliah.deskripsi FROM pertemuan
                RIGHT JOIN mata_kuliah
                ON pertemuan.kode = mata_kuliah.kode
                WHERE mata_kuliah.kode = '$kode'");
                $mata_kuliah = mysqli_fetch_array($query);
                ?>
                <h5 class="my-3">Deskripsi Mata Kuliah</h5>
                <hr style="width:75%; color:#F5D5AE; border-width:5px; border-radius:10px">
                <p> <?=$mata_kuliah['deskripsi']?> </p>
                <?php
            }
            ?>
        </div>
        <div class="col-11 col-md-7 mt-2 shadow-sm" style="border-radius:10px; border-top:#852a99 solid 10px; border-bottom:#852a99 solid 10px">
            <h4 class="my-3">Materi tiap pertemuan</h4>
            <hr style="width:75%; color:#F5D5AE; border-width:5px; border-radius:10px">
            <?php
            if(@$_GET['kode']) {
                $kode = $_GET['kode'];
                $query = mysqli_query($koneksi, "SELECT * FROM pertemuan 
                RIGHT JOIN mata_kuliah 
                ON pertemuan.kode = mata_kuliah.kode 
                WHERE mata_kuliah.kode = '$kode'");
                while($mata_kuliah = mysqli_fetch_array($query)) {
                    ?>
                    <div class="card mb-3 mt-2">
                        <div class="card-header shadow-sm">
                            <p><?=$mata_kuliah['nama_matkul']?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Minggu ke-</a><?=$mata_kuliah['minggu']?></h5>
                            <p class="card-text"><?=$mata_kuliah['materi']?></p>
                            <a a href="tampilMateri.php?id=<?=$mata_kuliah['id']?>" class="btn btn-primary">Tampilkan Materi</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'view/footer.php'
?>