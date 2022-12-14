<?php
include "view/header.php";
include "config/config.php";

if (@$_GET['kode']) {
    $kode = $_GET['kode'];

    $query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE kode='$kode'");
    $matakuliah =  mysqli_fetch_array($query);
};
?>

<div>
    <div class="container">
        <div class="row mt-2 justify-content-center">
            <div class="col-12 col-lg-8 mt-5 p-3 shadow" style="border-left:#842a98 solid 10px; border-radius:10px">
                <form method="POST" action="controller/controllerMatkul.php">
                    <label for="nama_matkul" class="pb-2">Nama Mata Kuliah: </label>
                    <input class="form-control mb-3" type="text" name="nama_matkul" id="nama_matkul" value="<?= @$matakuliah['nama_matkul'] ?>">
                    
                    <label for="deskripsi" class="pb-2">Deskripsi : </label>
                    <input class="form-control mb-3" type="text" name="deskripsi" id="deskripsi" value="<?= @$matakuliah['deskripsi'] ?>">
                    
                    <input type="hidden" name="kode" value="<?= @$matakuliah['kode'] ?>">
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "view/footer.php"
?>