<?php
include "config/config.php";
include "view/header.php";

$query = mysqli_query($koneksi, 'SELECT DISTINCT mata_kuliah.nama_matkul, mata_kuliah.kode  FROM pertemuan
            RIGHT JOIN mata_kuliah
            ON pertemuan.kode = mata_kuliah.kode');
?>


<div class="container">
    <div class="row mt-2 justify-content-center">
        <div class="col-12 col-lg-8 mt-5 p-3 shadow" style="border-left:#842a98 solid 10px; border-radius:10px">
            <form action="controller/controllerPertemuan.php" method="POST" enctype="multipart/form-data">
                <div class="form-floating">
                    <select name="kode" id="kode" class="form-select">
                        <?php
                        while ($pertemuan = mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?= $pertemuan['kode'] ?>"><?= $pertemuan['nama_matkul'] ?></option>
                            
                        <?php
                        }
                        ?>
                    </select>
                    <label for="kode">
                        Pilih Mata Kuliah :
                    </label>
                </div>
                <br>
                <label for="minggu" class="">Pertemuan minggu ke-</label>
                <input type="number" name="minggu" id="minggu" class="form-control mb-3" placeholder="1, 2, 3, 4 ....">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="materi" id="materi" style="height: 10rem"></textarea>
                    <label for="materi">Materi...</label>
                </div>
                <label for="materi_file" class="">
                    Inputkan modul pembelajaran max 16MB (<i>*Optional</i>) :
                </label>
                <input type="hidden" name="id">
                <input type="file" name="materi_file" id="materi_file" class="form-control">      
                <button type="submit" class="btn mt-5" style="background-color:#EF9A54; color:#fff">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'view/footer.php'
?>