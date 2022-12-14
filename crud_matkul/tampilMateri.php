<?php
include "view/header.php";
include "config/config.php";


if(@$_GET['id']) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM pertemuan
    RIGHT JOIN mata_kuliah
    ON pertemuan.kode = mata_kuliah.kode
    WHERE id = '$id'");
    $pertemuan = mysqli_fetch_array($query);
}

?>

<div class="container">
    <div class="row mt-2 justify-content-center">
        <div class="col-11 col-lg-8 mt-5 p-3 shadow" style="border-left:#842a98 solid 10px; border-radius:10px">
            <h2 class="text-center"><?=@$pertemuan['nama_matkul']?></h2>
            <h4>
                minggu ke-<?=@$pertemuan['minggu']?>
                <div class="text-end">
                    <a class="btn text-light" style="background-color:#EF9A54" data-bs-toggle="offcanvas" href="#editDeskripsi" role="button" aria-controls="offcanvasExample">
                    Edit deskripsi materi
                    </a>
                </div>
            </h4>
            <div class="offcanvas offcanvas-end text-light" style="background-color:efb07c" tabindex="-1" id="editDeskripsi" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Mau edit materi? </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form method="POST" action="controller/controllerPertemuan.php">
                        <textarea style="background-color:#efcbae" class="form-control" name="materi" id="materi" cols="30" rows="10"><?=@$pertemuan['materi']?></textarea>
                        <input type="hidden" name="id" value="<?=@$pertemuan['id']?>">
                        <button class="btn text-light mt-3" style="background-color:#842A98" type="submit">Yakin?</button>
                    </form>
                </div>
            </div>
            <p>
                <?=@$pertemuan['materi']?>
            </p>
            <div class="card">
                <div class="card-body">
                    <?php
                    if ($pertemuan['materi_file'] != ''){
                        ?>
                        <a href="materiFile/<?=@$pertemuan['kode'].$pertemuan['minggu']?>.pdf" class="card-text">Download</a>
                    <?php
                    } else {
                        ?>
                        <div class="text-center">
                            <img src="image/icons-nothing.png" alt="">
                            <h5 class="text-dark">Tidak ada file..</h5>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'view/footer.php'
?>